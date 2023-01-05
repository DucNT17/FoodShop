let profile = document.querySelector('.head .flex .profile');
let navbar = document.querySelector('.header .flex .narbar');

document.querySelector('#user-btn').onclick = () =>{
    profile.classList.toggle('active');
    navbar.classList.toggle('active');
};

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    profile.classList.remove('active');
}

window.onscroll = () =>{
    profile.classList.remove('active');
    navbar.classList.remove('active');
}

subImages = document.querySelectorAll('.update-product .image-container .sub-images img');
mainImage = document.querySelector('.update-product .image-container .main-image img');

subImages.forEach(images => {
    images.onclick = () =>{
        let src = images.getAttribute('src');
        mainImage.src = src;
    };
});