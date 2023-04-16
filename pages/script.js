const buttons = document.querySelectorAll('.custom-btn, .custom-btn-doc');

buttons.forEach(button => {
    button.addEventListener('click', () => {
        const buttonID = button.id;

        switch (buttonID) {
            case 'create-event-btn-clients':
                window.location.href = './tabels/customers.php';
                break;
            case 'create-event-btn-airlines':
                window.location.href = './tabels/airlines.php';
                break;
            case 'create-event-btn-tickets-sold':
                window.location.href = './tabels/buytickets.php';
                break;
            case 'create-event-btn-tickets':
                window.location.href = './tabels/tickets.php';
                break;
            case 'create-event-btn-coupons':
                window.location.href = './tabels/vouchers.php';
                break;
            case 'create-event-btn-cashiers':
                window.location.href = './tabels/cashiers.php';
                break;
            case 'create-event-btn-cash':
                window.location.href = './tabels/cash.php';
                break;

            case 'create-doc-btn-tickets-sold-monthly':
                window.location.href = './documents/doc1.php';
                break;
            case 'create-doc-btn-tickets-sales-by-airline':
                window.location.href = './documents/doc2.php';
                break;
            case 'create-doc-btn-airline-clients-by-date':
                window.location.href = './documents/doc3.php';
                break;
            default:
                break;
        }
    });

});

