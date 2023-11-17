document.addEventListener('DOMContentLoaded', function() {
    eventListeners();
    darkMode();
});

function darkMode() {
    const darkModeButton = document.querySelector('.dark-mode-button');
    const darkModePreference = window.matchMedia('(prefers-color-scheme: dark');

    if (darkModePreference.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
    
    darkModePreference.addEventListener('change', function() {
        if (darkModePreference.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    darkModeButton.addEventListener('click', function() {
        document.body.classList.toggle(`dark-mode`);
    });
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', responsiveNavigation);

    const contactMethod = document.querySelectorAll('input[name="contact[contact]"]');
    contactMethod.forEach(input => input.addEventListener('click', showContactMethods));
}

function responsiveNavigation() {
    const navigation = document.querySelector('.navigation');

    navigation.classList.toggle('show');
}

function showContactMethods() {
    console.log('seleccionando...');
}