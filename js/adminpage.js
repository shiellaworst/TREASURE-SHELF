const listItem = document.querySelectorAll('.list');

function activateLink() {
	listItem.forEach( item => {
		item.classList.remove('active');
	});
	this.classList.add('active');
}

listItem.forEach( item => {
	item.addEventListener('click', activateLink);
});


let popup = document.getElementById("popup")
        function openPopup(){
            popup.classList.remove("open-popup")
        }
        function closePopup(){
            popup.classList.add("open-popup")
        }




let popup1 = document.getElementById("popup1")
function openPopup1(){
	popup1.classList.add("open-popup1")
}
function closePopup1(){
	popup1.classList.remove("open-popup1")
}

let popup2 = document.getElementById("popup2")
function openPopup2(){
	popup2.classList.add("open-popup2")
}
function closePopup2(){
	popup2.classList.remove("open-popup2")
}

let popup3 = document.getElementById("popup3")
function openPopup3(){
	popup3.classList.add("open-popup3")
}
function closePopup3(){
	popup3.classList.remove("open-popup3")
}



let modal_add = document.getElementById("modal_add")
        function openModal_add(){
           modal_add.classList.add("open-modal_add")
        }
        function closeModal_add(){
            modal_add.classList.remove("open-modal_add")
        }


let modal_up = document.getElementById("modal_up")
function openModal_up(){
	modal_up.classList.add("open-modal_up")
}
function closeModal_up(){
	modal_up.classList.remove("open-modal_up")
}



/* <ADDING OF BOOK MODAL> */

let modal_add_book = document.getElementById("modal_add_book")
        function openModal_add_book(){
            modal_add_book.classList.add("open-modal_add_book")
        }
        function closeModal_add_book(){
            modal_add_book.classList.remove("open-modal_add_book")
        }


        const chooseFile = document.getElementById("my_image");
        const imgPreview = document.getElementById("img-preview");
        chooseFile.addEventListener("change", function () {
        getImgData();
        });


        function getImgData() {
        const files = chooseFile.files[0];
        if (files) {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(files);
            fileReader.addEventListener("load", function () {
            imgPreview.innerHTML = '<img src="' + this.result + '" />';
            });    
        }
        else{

        }
        }

/* </ADDING OF BOOK MODAL> */

