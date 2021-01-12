//Funkciók
function showSwitch(id) {
    var item = document.getElementById(id);
    if (item.style.display == 'block') {
	item.style.display = 'none';
    } else {
	item.style.display = 'block';
    }

}
function getPhp(from, target, id) {
    $.post(from, {"id": id}, function (result) {
	$(target).html(result);



    });



}

function openBookAt(charachterPath) {
    $.getJSON(charachterPath, function (charachter) {
	var pagePath = charachter.place;
	$.getJSON(pagePath, function (page) {
	    $('main').fadeOut('slow');
	    $('main').empty();
	    $('main').attr("id", "page");

	    //alert(page.text + charachter.charName)



	});


    });


}

function getBookCover(id) {
    if (Number.isInteger(id)) {
	getPhp("php/getBook.php", 'main', id);
	$('main').attr("id", "bookCover");
    } else {
	alert("Valami baj van")
    }
    $('main').attr("id", "cover");
    main();
}

function news() {
    getPhp("php/getNews.php", 'main');
    $('main').attr("id", "news");
    main();
}
function books() {
    getPhp("php/getBooksList.php", 'main');
    $('main').attr("id", "gallery");
    main();


}




//Eseményfigyelők
$("#openReadMenu").click(function () {
    books()
});
$("#openNews").click(function () {
    news()
});


//init()
news();