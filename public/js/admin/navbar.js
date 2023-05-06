const menuItems  = document.querySelectorAll('.nav-link');
menuItems.forEach(item => {
    item.addEventListener('click', function(event) {
        event.preventDefault();
        if(!item.classList.contains('active')){
            menuItems.forEach(item => item.classList.remove('active'));
            item.classList.add('active');
        }
    });
});

// const menuItems = document.querySelectorAll('.nav-link');
// const localStorageKey = 'activeNavItem';

// // Set active nav link on click
// menuItems.forEach(item => {
//   item.addEventListener('click', function(event) {
//     event.preventDefault();
//     if (!item.classList.contains('active')) {
//       menuItems.forEach(item => item.classList.remove('active'));
//       item.classList.add('active');
//       localStorage.setItem(localStorageKey, item.getAttribute('href'));
//     }
//   });
// });

// // Set active nav link on page load
// const activeNavItem = localStorage.getItem(localStorageKey) || '#';
// const activeLink = document.querySelector(`a[href="${activeNavItem}"]`);
// if (activeLink) {
//   activeLink.classList.add('active');
// }





var page_title = document.getElementById('page-title');
var requests = document.getElementById('requests-content');
var dashboard = document.getElementById('dashboard-content');
var message = document.getElementById('message-content');
var forms = document.getElementById('forms-content');
var announcement = document.getElementById('announcement-content');
var faqs = document.getElementById('faqs-content');
var settings = document.getElementById('settings-content');

function viewRequests(){
    page_title.textContent = "Appointment Requests";
    requests.style.display = 'block';
    dashboard.style.display = 'none';
    message.style.display = 'none';
    forms.style.display = 'none';
    announcement.style.display = 'none';
    faqs.style.display = 'none';
    settings.style.display = 'none';
}function viewDashboard(){
    page_title.textContent = "Dashboard";
    requests.style.display = 'none';
    dashboard.style.display = 'block';
    message.style.display = 'none';
    forms.style.display = 'none';
    announcement.style.display = 'none';
    faqs.style.display = 'none';
    settings.style.display = 'none';
}function viewMessage(){
    page_title.textContent = "Messages";
    requests.style.display = 'none';
    dashboard.style.display = 'none';
    message.style.display = 'block';
    forms.style.display = 'none';
    announcement.style.display = 'none';
    faqs.style.display = 'none';
    settings.style.display = 'none';
}function viewForms(){
    page_title.textContent = "Forms Configuration";
    requests.style.display = 'none';
    dashboard.style.display = 'none';
    message.style.display = 'none';
    forms.style.display = 'block';
    announcement.style.display = 'none';
    faqs.style.display = 'none';
    settings.style.display = 'none';
}function viewAnnouncement(){
    page_title.textContent = "Announcements";
    requests.style.display = 'none';
    dashboard.style.display = 'none';
    message.style.display = 'none';
    forms.style.display = 'none';
    announcement.style.display = 'block';
    faqs.style.display = 'none';
    settings.style.display = 'none';
}function viewFaqs(){
    page_title.textContent = "Frequently Asked Questions (FAQs)";
    requests.style.display = 'none';
    dashboard.style.display = 'none';
    message.style.display = 'none';
    forms.style.display = 'none';
    announcement.style.display = 'none';
    faqs.style.display = 'block';
    settings.style.display = 'none';
}function viewSettings(){
    page_title.textContent = "Settings";
    requests.style.display = 'none';
    dashboard.style.display = 'none';
    message.style.display = 'none';
    forms.style.display = 'none';
    announcement.style.display = 'none';
    faqs.style.display = 'none';
    settings.style.display = 'block';
}