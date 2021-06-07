(function ($) {
	'use strict';

	var kcgEditor,
		kcgData = window.kcgData || {};

	kcgEditor = {

		modal: false,

		init: function () {
			window.elementor.on('preview:loaded', kcgEditor.onPreviewLoaded);
		},

		onPreviewLoaded: function () {
			var $previewContents = window.elementor.$previewContents,
				elementorFrontend = $('#elementor-preview-iframe')[0].contentWindow.elementorFrontend;

			elementorFrontend.hooks.addAction('frontend/element_ready/kcg-adv-tab.default', function ($scope) {
				$scope.find('.kcg-editor-tab__edit-cover').on('click', kcgEditor.showTemplatesModal);
				$scope.find('.kcg-editor-new-template-link').on('click', function (event) {
					window.location.href = $(this).attr('href');
				});
			});

			kcgEditor.getModal().on('hide', function () {
				window.elementor.reloadPreview();
			});
		},

		showTemplatesModal: function () {
			var editLink = $(this).data('template-edit-link');

			kcgEditor.showModal(editLink);
		},

		showModal: function (link) {
			var $iframe,
				$loader;

			kcgEditor.getModal().show();

			$('#kcg-editor-template-edit-modal .dialog-message').html('<iframe src="' + link + '" id="kcg-editor-edit-frame" width="100%" height="100%"></iframe>');
			$('#kcg-editor-template-edit-modal .dialog-message').append('<div id="kcg-editor-loading"><div class="elementor-loader-wrapper"><div class="elementor-loader"><div class="elementor-loader-boxes"><div class="elementor-loader-box"></div><div class="elementor-loader-box"></div><div class="elementor-loader-box"></div><div class="elementor-loader-box"></div></div></div><div class="elementor-loading-title">Loading</div></div></div>');

			$iframe = $('#kcg-editor-edit-frame');
			$loader = $('#kcg-editor-loading');

			$iframe.on('load', function () {
				$loader.fadeOut(300);
			});
		},

		getModal: function () {

			if (!kcgEditor.modal) {
				this.modal = elementor.dialogsManager.createWidget('lightbox', {
					id: 'kcg-editor-template-edit-modal',
					closeButton: true,
					closeButtonClass: 'eicon-close',
					hide: {
						onBackgroundClick: false
					}
				});
			}

			return kcgEditor.modal;
		}

	};

	$(window).on('elementor:init', kcgEditor.init);

})(jQuery);
(function ($) {
	$(document).ready(function () {
		if (window.elementor) {
			elementor.hooks.addFilter("element/view", function (groups_prototype, element) {
				return groups_prototype.extend({
					getContextMenuGroups: function () {
						return groups_prototype.prototype.getContextMenuGroups.apply(this, arguments);
					},
				});
			});
			elementor.hooks.addFilter("elements/column/contextMenuGroups", KcgtemToContextMenu);
		}
	});
	function KcgtemToContextMenu(groups, element) {
		var clipboard_index = groups.findIndex(function (item) {
			return "addNew" === item.name;
		});
		groups[clipboard_index].actions.push({
			name: "kcg-add-nested-section",
			title: "KCG Nested Section",
			icon: "no-absulate",
			callback: function () {
				kcgInsertNestedSection(element);
			},
			isEnabled: function () {
				return true;
			},
		});
		return groups;
	}
	function kcgInsertNestedSection(element) {
		var element_view = element.getContainer().view;
		if (element_view.getElementType() === "column") {
			element_view.addElement({ elType: "section", isInner: true, settings: {}, elements: [{ id: elementor.helpers.getUniqueID(), elType: "column", isInner: true, settings: { _column_size: 100 }, elements: [] }] });
		}
	}
})(jQuery);