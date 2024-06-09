jQuery(document).ready(function ($) {
    // 监听变体选择变化
    $('select[name^="attribute_"]').change(function () {
        var baseUrl = window.location.origin + window.location.pathname.split('/').slice(0, -1).join('/');
        var productSlug = window.location.pathname.split('/').pop();
        var newUrl = baseUrl + '/' + productSlug;

        var newTitle = productSlug.replace(/-/g, ' ');

        // 遍历所有变体选择框，构建新的URL和标题
        $('select[name^="attribute_"]').each(function () {
            var attributeName = $(this).attr('name').replace('attribute_', '');
            var attributeValue = $(this).val();

            if (attributeValue) {
                newUrl += '-' + attributeValue.toLowerCase();
                newTitle += ' - ' + attributeValue;
            }
        });

        // 更新URL
        window.history.replaceState(null, null, newUrl);

        // 更新标题
        document.title = newTitle;
    });
});