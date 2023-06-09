<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Das :attribute muss akzeptiert werden.',
    'active_url' => 'Das :attribute ist keine gültige URL.',
    'after' => 'Das :attribute muss ein Datum nach :date sein.',
    'after_or_equal' => 'Das :attribute muss ein Datum nach oder gleich dem :date sein.',
    'alpha' => 'Das :attribute darf nur Buchstaben enthalten.',
    'alpha_dash' => 'Das :attribute darf nur Buchstaben, Zahlen, Bindestriche und Unterstriche enthalten.',
    'alpha_num' => 'Das :attribute darf nur Buchstaben und Zahlen enthalten.',
    'array' => 'Das :attribute muss ein Array sein.',
    'before' => 'Das :attribute muss ein Datum vor :date sein.',
    'before_or_equal' => 'Das :attribute muss ein Datum vor oder gleich :date sein.',
    'between' => [
        'numeric' => 'Das :attribute muss zwischen :min und :max liegen.',
        'file' => 'Das :attribute muss zwischen :min und :max Kilobytes liegen.',
        'string' => 'Das :attribute muss zwischen :min und :max Zeichen liegen.',
        'array' => 'Das :attribute muss zwischen :min und :max Elemente haben.',
    ],
    'boolean' => 'Das Feld :attribute muss true oder false sein.',
    'confirmed' => 'Das :attribute confirmation stimmt nicht überein.',
    'date' => 'Das :attribute ist kein gültiges Datum.',
    'date_equals' => 'Das :attribute muss ein Datum sein, das gleich dem :date ist.',
    'date_format' => 'Das :attribute stimmt nicht mit dem Format :format überein.',
    'different' => 'Das :attribute und :other müssen unterschiedlich sein.',
    'digits' => 'Das :attribute muss :digits Ziffern sein.',
    'digits_between' => 'Das :attribute muss zwischen :min und :max digits liegen.',
    'dimensions' => 'Das :attribute hat ungültige Bildabmessungen.',
    'distinct' => 'Das :attribute-Feld hat einen doppelten Wert.',
    'email' => 'Das muss eine gültige E-Mail-Adresse sein.',
    'ends_with' => 'Das :attribute muss mit einem der folgenden enden: :values.',
    'exists' => 'Das ausgewählte :attribute ist ungültig.',
    'file' => 'Das :attribute muss eine Datei sein.',
    'filled' => 'Das :attribute-Feld muss einen Wert haben.',
    'gt' => [
        'numeric' => 'Das :attribute muss größer sein als :wert.',
        'file' => 'Das :attribute muss größer als :value kilobytes sein.',
        'string' => 'Das :attribute muss größer als :Wert Zeichen sein.',
        'array' => 'Das :attribute muss mehr als :Wert Elemente haben.',
    ],
    'gte' => [
        'numerisch' => 'Das :attribute muss größer als oder gleich :wert sein.',
        'file' => 'Das :attribute muss größer oder gleich :value kilobytes sein.',
        'string' => 'Das :attribute muss größer oder gleich :Wert Zeichen sein.',
        'array' => 'Das :attribute muss mindestens den :Wert items haben.',
    ],
    'image' => 'Das :attribute muss ein Bild sein.',
    'in' => 'Das ausgewählte :attribute ist ungültig.',
    'in_array' => 'Das :attribute-Feld existiert nicht in :other.',
    'integer' => 'Das :attribute muss eine Ganzzahl sein.',
    'ip' => 'Das :attribute muss eine gültige IP-Adresse sein.',
    'ipv4' => 'Das :attribute muss eine gültige IPv4-Adresse sein.',
    'ipv6' => 'Das :attribute muss eine gültige IPv6-Adresse sein.',
    'json' => 'Das :attribute muss ein gültiger JSON-String sein.',
    'lt' => [
        'numeric' => 'Das :attribute muss kleiner sein als :value.',
        'file' => 'Das :attribute muss kleiner als :value kilobytes sein.',
        'string' => 'Das :attribute muss kleiner als :wert Zeichen sein.',
        'array' => 'Das :attribute muss weniger als :Wert Elemente haben.',
    ],
    'lte' => [
        'numeric' => 'Das :attribute muss kleiner oder gleich :value sein.',
        'file' => 'Das :attribute muss kleiner oder gleich :value kilobytes sein.',
        'string' => 'Das :attribute muss kleiner oder gleich :Wert Zeichen sein.',
        'array' => 'Das :attribute darf nicht mehr als :Wert Elemente haben.',
    ],
    'max' => [
        'numerisch' => 'Das :attribute darf nicht größer als :max sein.',
        'file' => 'Das :attribute darf nicht größer als :max kilobytes sein.',
        'string' => 'Das :attribute darf nicht größer als :max Zeichen sein.',
        'array' => 'Das :attribute darf nicht mehr als :max Elemente haben.',
    ],
    'mimes' => 'Das :attribute muss eine Datei vom Typ: :values sein.',
    'mimetypes' => 'Das :attribute muss eine Datei vom Typ: :values sein',
    'min' => [
        'numeric' => 'Das :attribute muss mindestens :min sein.',
        'file' => 'Das :attribute muss mindestens :min Kilobytes groß sein.',
        'string' => 'Das :attribute muss mindestens :min Zeichen lang sein.',
        'array' => 'Das :attribute muss mindestens :min Elemente haben.',
    ],
    'not_in' => 'Das ausgewählte :attribute ist ungültig.',
    'not_regex' => 'Das :attributeformat ist ungültig.',
    'numeric' => 'Das :attribute muss eine Zahl sein.',
    'password' => 'Das Passwort ist falsch.',
    'present' => 'Das :attribute-Feld muss vorhanden sein.',
    'regex' => 'Das :attribute-Format ist ungültig.',
    'required' => 'Das :attributefeld ist erforderlich.',
    'required_if' => 'Das :attribute-Feld ist erforderlich, wenn :other :value ist.',
    'required_unless' => 'Das :attribute-Feld ist',


    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Custom Validation attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */
    'unique' => ':attribute gibt es schon.',
    'same' => ':attribute und :other müssen übereinstimmen.',
];
