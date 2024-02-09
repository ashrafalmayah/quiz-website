const $list = Array
    .from(
        document.getElementsByTagName('li'),
    );
$list.forEach(($li) => {
    $li.addEventListener(
        'click',
        () => {
            document
                .getElementsByClassName('active')[0]
                .classList
                .remove('active');
            $li.classList.add('active');
        },
    );
});