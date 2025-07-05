(function ($) {
    function toggleTabs() {
        $('#bar-tab').show();
        $('#background-tab').hide();
        $('#nav-bar-tab').addClass('nav-tab-active');
        $('#nav-background-tab').removeClass('nav-tab-active');
        updateScrollStyles(); // Mettez à jour les styles pour l'onglet actif
    }

    function updateScrollStyles() {
        let width = $('input[class="scrollbar-width-range"]').val();
        let scrollbarColorOrGradient = $('#scrollbar_color_or_gradient').val();
        let backgroundColorOrGradient = $('#background_color_or_gradient').val();
        let scrollbarColor = '';
        let scrollbarBackground = '';
        let borderRadius = $('input[class="scrollbar-border-radius-range"]').val();

        $('.scrollbar-width-value').text(width);
        $('.scrollbar-border-radius-value').text(borderRadius);

        if (scrollbarColorOrGradient === 'gradient') {
            let colorStart = $('input[name="wp_scroll_settings[scrollbar_gradient_color_start]"]').val();
            let colorEnd = $('input[name="wp_scroll_settings[scrollbar_gradient_color_end]"]').val();
            scrollbarColor = `linear-gradient(${colorStart}, ${colorEnd})`;
        } else {
            scrollbarColor = $('input[name="wp_scroll_settings[scrollbar_color]"]').val();
        }

        if (backgroundColorOrGradient === 'gradient') {
            let backgroundStart = $('input[name="wp_scroll_settings[background_gradient_color_start]"]').val();
            let backgroundEnd = $('input[name="wp_scroll_settings[background_gradient_color_end]"]').val();
            scrollbarBackground = `linear-gradient(${backgroundStart}, ${backgroundEnd})`;
        } else {
            scrollbarBackground = $('input[name="wp_scroll_settings[background_color]"]').val();
        }

        let previewCss = `
            body::-webkit-scrollbar {
                width: ${width}px !important;
            }
            body::-moz-scrollbar {
                width: ${width}px !important;
            }
            body::-webkit-scrollbar-thumb {
                background: ${scrollbarColor} !important;
                border-radius: ${borderRadius}px !important;
                border: 2px solid ${scrollbarBackground} !important;
            }
            body::-moz-scrollbar-thumb {
                background: ${scrollbarColor} !important;
                border-radius: ${borderRadius}px !important;
                border: 2px solid ${scrollbarBackground} !important;
            }
            body::-webkit-scrollbar-track {
                background: ${scrollbarBackground} !important;
            }
            body::-moz-scrollbar-track {
                background: ${scrollbarBackground} !important;
            }
        `;

        $('#scroll-body-style').html(previewCss);
    }

    $(document).ready(function () {
        toggleTabs(); // Initialise le premier onglet

        $('#nav-bar-tab').click(function (e) {
            e.preventDefault();
            $('#bar-tab').show();
            $('#background-tab').hide();
            $(this).addClass('nav-tab-active');
            $('#nav-background-tab').removeClass('nav-tab-active');
            updateScrollStyles(); // Mettez à jour les styles pour l'onglet actif
        });

        $('#nav-background-tab').click(function (e) {
            e.preventDefault();
            $('#bar-tab').hide();
            $('#background-tab').show();
            $(this).addClass('nav-tab-active');
            $('#nav-bar-tab').removeClass('nav-tab-active');
            updateScrollStyles(); // Mettez à jour les styles pour l'onglet actif
        });

        $('.my-color-picker').wpColorPicker({
            change: updateScrollStyles,
            clear: updateScrollStyles
        });

        $('input[type="text"], input[type="number"], input[type="range"], select').on('input change', updateScrollStyles);

        $('#scrollbar_color_or_gradient').change(function () {
            toggleColorGradientFields('scrollbar_color_or_gradient', 'scrollbar_color', ['scrollbar_gradient_color_start', 'scrollbar_gradient_color_end']);
        }).change();

        $('#background_color_or_gradient').change(function () {
            toggleColorGradientFields('background_color_or_gradient', 'background_color', ['background_gradient_color_start', 'background_gradient_color_end']);
        }).change();

        function toggleColorGradientFields(selector, colorField, gradientFields) {
            const fieldType = $(`#${selector}`).val();
            if (fieldType === 'gradient') {
                $(`input[name="wp_scroll_settings[${colorField}]"]`).closest('tr').hide();
                gradientFields.forEach(field => {
                    $(`input[name="wp_scroll_settings[${field}]"]`).closest('tr').show();
                });
            } else {
                $(`input[name="wp_scroll_settings[${colorField}]"]`).closest('tr').show();
                gradientFields.forEach(field => {
                    $(`input[name="wp_scroll_settings[${field}]"]`).closest('tr').hide();
                });
            }
        }
    });
})(jQuery);