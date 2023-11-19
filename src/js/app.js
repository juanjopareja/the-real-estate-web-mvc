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

function showContactMethods(event) {
    const contactDiv = document.querySelector('#contact');
    console.log(event);

    if (event.target.value === 'phone') {
        contactDiv.innerHTML = `
            <label for="phone">Teléfono:</label>
            <input type="tel" placeholder="Tu teléfono" id="phone" name="contact[phone]">
            
            <p>Selecciona la fecha y la hora para contactarte por teléfono</p>
            
            <label for="date">Fecha:</label>
            <input type="date" id="date" name="contact[date]">

            <label for="hour">Hora:</label>
            <input type="time" id="hour" min="09:00" max="18:00" name="contact[hour]">
        `;
    } else {
        contactDiv.innerHTML = `
            <label for="email">E-mail:</label>
            <input type="email" placeholder="Tu Email" id="email" name="contact[email]" required>
        `;
    }

}