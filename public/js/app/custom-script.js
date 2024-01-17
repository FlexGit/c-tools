$(function() {
    $(document).on('keyup', 'input[id="data.title"]', function() {
        $('input[id="data.alias"]').val(transliterate($(this).val()));
    });

    function transliterate(s) {
        var converter = {
            'а': 'a',    'б': 'b',    'в': 'v',    'г': 'g',    'д': 'd',
            'е': 'e',    'ё': 'e',    'ж': 'zh',   'з': 'z',    'и': 'i',
            'й': 'y',    'к': 'k',    'л': 'l',    'м': 'm',    'н': 'n',
            'о': 'o',    'п': 'p',    'р': 'r',    'с': 's',    'т': 't',
            'у': 'u',    'ф': 'f',    'х': 'h',    'ц': 'c',    'ч': 'ch',
            'ш': 'sh',   'щ': 'sch',  'ь': '',     'ы': 'y',    'ъ': '',
            'э': 'e',    'ю': 'yu',   'я': 'ya'
        };

        s = s.toLowerCase();

        var result = '';

        for (var i = 0; i < s.length; ++i) {
            if (converter[s[i]] == undefined){
                result += s[i];
            } else {
                result += converter[s[i]];
            }
        }

        result = result.replace(/[^-0-9a-z]/g, '-');
        result = result.replace(/[-]+/g, '-');
        result = result.replace(/^\-|-$/g, '');

        return result;
    }
});
