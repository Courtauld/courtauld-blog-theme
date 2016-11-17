// This script adds the .active class to the nav bar.
// The .active class then allows css to be applied to each.
// This css is intended to shift the nav off-canvas and move the wrap accordingly.
// This will also remove the class when clicked outside of the box
// This script depends on JQUERY

$(document).ready(function () {
    $('.header__menu-link').on('click', function(e){
        e.preventDefault ? e.preventDefault() : e.returnValue = false;
        e.stopPropagation();

        $('.header__menu').toggleClass('active');
        $(this).toggleClass('active');
    });

    // close menu if not clicked on
    $(document).on('click', function closeMenu(e) {
        if ($('.header__menu').has(e.target).length === 0)  {
            $('.header__menu').removeClass('active');
            $('.header__menu-link').removeClass('active');
        } else {
            $(document).on('click', closeMenu);
        }
    });
});
