const buttons = document.querySelector('.custom-btn');

buttons.forEach(button => {
    button.addEventListener('click', () => {
        const buttonID = getAttribute('id');

        switch (buttonID) {
            case 'create-event-btn-clients':
                window.location.href = 'clients.html';
                break;
            case 'create-event-btn-airlines':
                window.location.href = 'airlines.html';
                break;
            case 'create-event-btn-tickets-sold':
                window.location.href = 'tickets-sold.html';
                break;
            case 'create-event-btn-tickets':
                window.location.href = 'tickets.html';
                break;
            case 'create-event-btn-coupons':
                window.location.href = 'coupons.html';
                break;
            case 'create-event-btn-cashiers':
                window.location.href = 'cashiers.html';
                break;
            case 'create-event-btn-cash':
                window.location.href = 'cash.html';
                break;

            case 'create-doc-btn-tickets-sold-monthly':
                window.location.href = 'coupons.html';
                break;
            case 'create-doc-btn-tickets-sales-by-airline':
                window.location.href = 'cashiers.html';
                break;
            case 'create-doc-btn-airline-clients-by-date':
                window.location.href = 'cash.html';
                break;
            default:
                break;
        }
    });

});

