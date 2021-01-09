//Funkciók
function showSwitch(id) {
    var item = document.getElementById(id);
    if (item.style.display == 'block') {
	item.style.display = 'none';
    } else {
	item.style.display = 'block';
    }

}
function getPhp(from,target,id) {
    $.post(from,{"id":id}, function (result) {
	$(target).html(result);



    });



}

function openBookAt(charachterPath){
    $.getJSON(charachterPath, function(charachter){
	var pagePath = charachter.place;
	$.getJSON(pagePath, function(page){
	    $('main').fadeOut('slow');
	    $('main').empty();
	    
	    alert(page.text+charachter.charName)
	    
	    
	    
	});
	

  });
    
    
}

function getBook(id){
    if(Number.isInteger(id)){
    getPhp("php/getBook.php",'main',id);
    }
else{alert("Valami baj van")}
}

function news() {
    getPhp("php/getNews.php", 'main');
}
function books() {
    getPhp("php/getBooksList.php", 'main');
    
    
}




//Eseményfigyelők
$("#openReadMenu").click(function(){books()});
$("#openNews").click(function(){news()});


//init()
news();