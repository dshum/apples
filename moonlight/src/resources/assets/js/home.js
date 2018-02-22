$(function() {
    $('body').on('click', '.main .elements span.open', function() {
        var span = $(this);
        var li = span.parents('li').first();
        var rubric = span.attr('rubric');
        var bind = span.attr('bind');
        var classId = span.attr('classId');
        var display = span.attr('display');

        if (display == 'show') {
            $('.main .elements ul[node="' + classId + '"]').hide();
            span.attr('display', 'hide').html('<i class="fa fa-angle-down"></i>');

            $.post('/moonlight/rubrics/node/close', {
                rubric: rubric,
                classId: classId
            });
            
        } else if (display == 'hide') {
            $('.main .elements ul[node="' + classId + '"]').show();
            span.attr('display', 'show').html('<i class="fa fa-angle-up"></i>');

            $.post('/moonlight/rubrics/node/open', {
                rubric: rubric,
                classId: classId
            });
        } else {
            $.blockUI();

            $.getJSON('/moonlight/rubrics/node/get', {
                rubric: rubric,
                bind: bind,
                classId: classId
            }, function(data) {
                $.unblockUI();

                if (data.html) {
                    li.append(data.html);
                    span.attr('display', 'show').html('<i class="fa fa-angle-up"></i>');
                }
            });
        }
    });
});