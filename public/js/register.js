let show_customer_register_form_btn = document.getElementById('customer-register');
let show_organizer_register_form_btn = document.getElementById('organizer-register');


let customer_register_form = document.getElementById('customer-form');
let organizer_register_form = document.getElementById('organizer-form');



show_customer_register_form_btn.addEventListener('click',function (){
    show_organizer_register_form_btn.classList.remove('choice-btn');
    this.classList.add('choice-btn');
    organizer_register_form.classList.add('hidden');
    customer_register_form.classList.remove('hidden');
});

show_organizer_register_form_btn.addEventListener('click',function (){
    show_customer_register_form_btn.classList.remove('choice-btn');
    this.classList.add('choice-btn');
    customer_register_form.classList.add('hidden');
    organizer_register_form.classList.remove('hidden');
});

