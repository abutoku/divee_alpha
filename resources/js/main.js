'use strict';

//---メニューボタンの動き-----------------------------//

//初期設定
$('#mask').hide(); //メニュー背景隠す
$('#menu_contents').hide(); //メニュー中身隠す

//ハンバーガーボタンを押したら発動
$('#hamburger').on('click', function () {
    $('#mask').show(); //メニュー背景表示
    $('#menu_contents').show(400); //メニュー中身表示
});

//背景をクリックしたら発動
$('#mask').on('click', function () {
    $('#mask').hide(); //メニュー背景隠す
    $('#menu_contents').hide(); //メニュー中身隠す
});

//---プロフィール写真が選択されたらプレビューを表示---//

$('#profile_image').on('change', function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $("#demo_img").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
});

//---投稿写真が選択されたらプレビューを表示-----------//

$('#post_picture').on('change', function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $("#demo_picture").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
});

//---サムネイル変更画面-----------------------------//

//一覧画面は消しておく
$('#thumbnail_view').hide();
$('#delete_view').hide();

//サムネイル変更をクリックすると登録写真一覧を表示
$('#select_picture').on('click', function () {
    $('#thumbnail_view').show();
})

//写真を削除をクリックすると登録写真一覧を表示
$('#delete_picture').on('click', function () {
    $('#delete_view').show();
})
