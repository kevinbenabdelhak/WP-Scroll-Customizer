(function ($) {
    function toggleTabs(tab) {
        $('#bar-tab, #background-tab').hide();
        $('#nav-bar-tab, #nav-background-tab').removeClass('nav-tab-active');
        if (tab === 'bar') {
            $('#bar-tab').show();
            $('#nav-bar-tab').addClass('nav-tab-active');
        } else if (tab === 'background') {
            $('#background-tab').show();
            $('#nav-background-tab').addClass('nav-tab-active');
        }
        updateScrollStyles();
    }

    function updateScrollStyles() {
        let width = $('input[class="scrollbar-width-range"]').val();
        let scrollbarColorOrGradient = $('#scrollbar_color_or_gradient').val();
        let backgroundColorOrGradient = $('#background_color_or_gradient').val();
        let scrollbarColor = '';
        let scrollbarBackground = '';
        let borderRadius = $('input[class="scrollbar-border-radius-range"]').val();

        // GESTION GRADIENT AVANCÉ
        let orientation = $('#scrollbar_gradient_orientation').val() || 'to bottom';
        let reversed = $('#scrollbar_gradient_reversed').is(':checked');

        if (scrollbarColorOrGradient === 'gradient') {
            let colorStart = $('input[name="wp_scroll_settings[scrollbar_gradient_color_start]"]').val();
            let colorMid = $('input[name="wp_scroll_settings[scrollbar_gradient_color_mid]"]').val() || null;
            let colorEnd = $('input[name="wp_scroll_settings[scrollbar_gradient_color_end]"]').val();
            let stops = reversed
                ? [colorEnd, colorMid, colorStart].filter(Boolean)
                : [colorStart, colorMid, colorEnd].filter(Boolean);
            scrollbarColor = `linear-gradient(${orientation}, ${stops.join(', ')})`;
        } else {
            scrollbarColor = $('input[name="wp_scroll_settings[scrollbar_color]"]').val();
        }

        // Background gradient avancé aussi
        let orientationBg = $('#background_gradient_orientation').val() || 'to bottom';
        let reversedBg = $('#background_gradient_reversed').is(':checked');
        if (backgroundColorOrGradient === 'gradient') {
            let backgroundStart = $('input[name="wp_scroll_settings[background_gradient_color_start]"]').val();
            let backgroundMid = $('input[name="wp_scroll_settings[background_gradient_color_mid]"]').val() || null;
            let backgroundEnd = $('input[name="wp_scroll_settings[background_gradient_color_end]"]').val();
            let bgStops = reversedBg
                ? [backgroundEnd, backgroundMid, backgroundStart].filter(Boolean)
                : [backgroundStart, backgroundMid, backgroundEnd].filter(Boolean);
            scrollbarBackground = `linear-gradient(${orientationBg}, ${bgStops.join(', ')})`;
        } else {
            scrollbarBackground = $('input[name="wp_scroll_settings[background_color]"]').val();
        }

        $('.scrollbar-width-value').text(width);
        $('.scrollbar-border-radius-value').text(borderRadius);

        let previewCss = `
            body::-webkit-scrollbar {
                width: ${width}px !important;
            }
            body::-webkit-scrollbar-thumb {
                background: ${scrollbarColor} !important;
                border-radius: ${borderRadius}px !important;
                border: 2px solid ${scrollbarBackground} !important;
                background-clip: padding-box !important;
            }
            body::-webkit-scrollbar-track {
                background: ${scrollbarBackground} !important;
            }
        `;

        $('#scroll-body-style').html(previewCss);
    }

    $(document).ready(function () {
        toggleTabs('bar');

        $('#nav-bar-tab').click(function (e) {
            e.preventDefault();
            toggleTabs('bar');
        });

        $('#nav-background-tab').click(function (e) {
            e.preventDefault();
            toggleTabs('background');
        });

        $('.my-color-picker').wpColorPicker({
            change: updateScrollStyles,
            clear: updateScrollStyles
        });

        $('input[type="text"], input[type="number"], input[type="range"], select').on('input change', updateScrollStyles);
        $('input[type="checkbox"]').on('change', updateScrollStyles);

        $('#scrollbar_color_or_gradient').change(function () {
            toggleColorGradientFields('scrollbar_color_or_gradient', 'scrollbar_color', ['scrollbar_gradient_color_start', 'scrollbar_gradient_color_mid', 'scrollbar_gradient_color_end', 'scrollbar_gradient_orientation', 'scrollbar_gradient_reversed']);
        }).change();

        $('#background_color_or_gradient').change(function () {
            toggleColorGradientFields('background_color_or_gradient', 'background_color', ['background_gradient_color_start', 'background_gradient_color_mid', 'background_gradient_color_end', 'background_gradient_orientation', 'background_gradient_reversed']);
        }).change();

        function toggleColorGradientFields(selector, colorField, gradientFields) {
            const fieldType = $(`#${selector}`).val();
            if (fieldType === 'gradient') {
                $(`input[name="wp_scroll_settings[${colorField}]"]`).closest('tr').hide();
                gradientFields.forEach(field => {
                    $(`[name="wp_scroll_settings[${field}]"], #${field}`).closest('tr').show();
                });
            } else {
                $(`input[name="wp_scroll_settings[${colorField}]"]`).closest('tr').show();
                gradientFields.forEach(field => {
                    $(`[name="wp_scroll_settings[${field}]"], #${field}`).closest('tr').hide();
                });
            }
        }

        updateScrollStyles();
    });
})(jQuery);