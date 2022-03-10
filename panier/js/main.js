(function($){
    $('.add').click(function (e) { 
        e.preventDefault();
        $.get($(this)).attr('href'),{},function(data){
            //console.log(data);
        },'json';
        return false;
    });
})(jQuery);