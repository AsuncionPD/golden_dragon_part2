const tabContent = document.querySelector('.tab-content');
const generalLink = document.querySelector('.general-link');
const changePasswordLink = document.querySelector('.change-password-link');

changePasswordLink.addEventListener('click', () => {
    tabContent.classList.add('active');
});

generalLink.addEventListener('click', () => {
    tabContent.classList.remove('active');
});