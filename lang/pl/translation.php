<?php

return [  
    
    'register' =>
    [
        'nickname' => 'Nazwa użytkownika',
        'firstname' => 'Imie',
        'lastname' => 'Nazwisko',
        'password' => 'Hasło',
        'passwordrepeat' => 'Powtórz hasło',                
        'phonenumber' => 'Numer Telefonu',
        'email' => 'Adres E-Mail',
        'or' => 'lub',
        'buttons' =>
        [
            'signup' => 'Zarejestruj się',
            'register' => 'Zarejestruj',
            'login' => 'Zaloguj',

        ]
    ],
    
    'user' => 
    [
        'title' => 'Konto',
        'label' => 
            [
              'create' => 'Dodanie nowego uzytkownika',
              'edit' => 'Edycja danych uzytkownika',
            ],
        'attribute' => 
            [
                'email' => 'Email',
                'nickname' => 'Nazwa użytkownika',
                'firstname' => 'Imie',
                'lastname' => 'Nazwisko',
                'password' => 'Hasło',                
                'phonenumber' => 'Numer Telefonu',
                'punkty' => 'Punkty',
            ],
        'flashes' => 
        [
            'success' => 
            [
                'stored' => 'Dodano klienta :nazwisko',
                'updated' => 'Zaktualizowano klienta :nazwisko',
                'nothing-changed' => 'Dane klienta :nazwisko nie zmieniły się'
            ],
            'error' =>
            [
                'duplicate_entry' => 'Dane Klienta :nazwisko nie zmieniły się przez wzgląd na wystepowanie takiego adresu Email.',
            ]
        ]
    ],

    
];
