<button onclick="topFunction()" id="myBtn" title="Go to top" style="display: none">Top</button>
@php
    $Types = [
        ["ITEM_USE",3,35],
        ["ITEM_AUTOUSE",4,5],
        ["ITEM_MATERIAL",5,7],
        ["ITEM_SPECIAL",6,3],
        //["ITEM_TOOL",7,0],
        ["ITEM_LOTTERY",8,1],
        //["ITEM_ELK",9,0],
        ["ITEM_METIN",10,4],
        ["ITEM_CONTAINER",11,0],
        ["ITEM_FISH",12,1],
        ["ITEM_ROD",13,0],
        ["ITEM_RESOURCE",14,11],
        ["ITEM_CAMPFIRE",15,0],
        ["ITEM_UNIQUE",16,4],
        ["ITEM_SKILLBOOK",17,5],
        ["ITEM_QUEST",18,0],
        ["ITEM_POLYMORPH",19,0],
        ["ITEM_TREASURE_BOX",20,0],
        ["ITEM_TREASURE_KEY",21,0],
        ["ITEM_SKILLFORGET",22,0],
        ["ITEM_GIFTBOX",23,0],
        ["ITEM_PICK",24,0],
        //["ITEM_HAIR",25,0],
        //["ITEM_TOTEM",26,0],
        ["ITEM_BLEND",27,1],
        ["ITEM_COSTUME",28,14],
        //["ITEM_DS",29,5],
        //["ITEM_SPECIAL_DS",30,0],
        //["ITEM_EXTRACT",31,1],
        //["ITEM_SECONDARY_COIN",32,0],
        ["ITEM_RING",33,0],
        ["ITEM_BELT",34,0],
        ["ITEM_PET",35,0],
        //["ITEM_MEDIUM",36,0],
        ["ITEM_GACHA",37,0],
        ["ITEM_MOUNT_SKIN",38,0],
        ["ITEM_MINIME_SKIN",39,7],
    ];
    $Subtypes = [
    "ITEM_USE",[
        "USE_POTION","USE_TALISMAN","USE_TUNING","USE_MOVE","USE_TREASURE_BOX","USE_MONEYBAG","USE_BAIT","USE_ABILITY_UP","USE_AFFECT","USE_CREATE_STONE","USE_SPECIAL","USE_POTION_NODELAY","USE_CLEAR","USE_INVISIBILITY","USE_DETACHMENT","USE_BUCKET","USE_POTION_CONTINUE",
        "USE_CLEAN_SOCKET","USE_CHANGE_ATTRIBUTE","USE_ADD_ATTRIBUTE","USE_ADD_ACCESSORY_SOCKET","USE_PUT_INTO_ACCESSORY_SOCKET","USE_ADD_ATTRIBUTE2","USE_RECIPE",
        "USE_CHANGE_ATTRIBUTE2","USE_BIND","USE_UNBIND","USE_TIME_CHARGE_PER","USE_TIME_CHARGE_FIX","USE_PUT_INTO_BELT_SOCKET","USE_PUT_INTO_RING_SOCKET","USE_CHANGE_COSTUME_ATTR","USE_RESET_COSTUME_ATTR","USE_UNK33","USE_CHANGE_ATTRIBUTE_PLUS","USE_RESET_LOOK_VNUM"]
    ,
    ["ITEM_AUTOUSE",["AUTOUSE_POTION","AUTOUSE_ABILITY_UP","AUTOUSE_BOMB","AUTOUSE_GOLD","AUTOUSE_MONEYBAG","AUTOUSE_TREASURE_BOX"]],
    ["ITEM_MATERIAL",["MATERIAL_LEATHER","MATERIAL_BLOOD","MATERIAL_ROOT","MATERIAL_NEEDLE","MATERIAL_JEWEL"]],
    ["ITEM_SPECIAL",["SPECIAL_MAP","SPECIAL_KEY","SPECIAL_DOC","SPECIAL_SPIRIT"]],
    ["ITEM_LOTTERY",["LOTTERY_TICKET","LOTTERY_INSTANT"]],
    ["ITEM_METIN",["METIN_NORMAL","METIN_GOLD","METIN_WEAPON","METIN_BODY"]],
    ["ITEM_FISH",["FISH_ALIVE","FISH_DEAD"]],
    ["ITEM_RESOURCE",["RESOURCE_FISHBONE","RESOURCE_WATERSTONEPIECE","RESOURCE_WATERSTONE","RESOURCE_BLOOD_PEARL","RESOURCE_BLUE_PEARL","RESOURCE_WHITE_PEARL","RESOURCE_BUCKET","RESOURCE_CRYSTAL","RESOURCE_GEM","RESOURCE_STONE","RESOURCE_METIN","RESOURCE_ORE"]],
    ["ITEM_UNIQUE",["UNIQUE_NONE","UNIQUE_BOOK","UNIQUE_SPECIAL_RIDE","UNIQUE_SPECIAL_MOUNT_RIDE"]],
    ["ITEM_SKILLBOOK",["SKILL_NONE","SKILL_WARRIOR","SKILL_NINJA","SKILL_SURA","SKILL_SHAMAN"]],
    ["ITEM_BLEND",["NORMAL_BLEND","INFINITY_BLEND"]],
    ["ITEM_COSTUME",["COSTUME_BODY","COSTUME_HAIR","COSTUME_MOUNT","COSTUME_ACCE","COSTUME_WEAPON_SWORD","COSTUME_WEAPON_DAGGER","COSTUME_WEAPON_BOW","COSTUME_WEAPON_TWO_HANDED","COSTUME_WEAPON_BELL","COSTUME_WEAPON_FAN","COSTUME_WEAPON_CLAW"]],
    ["ITEM_MINIME_SKIN",["MINIME_BODY","MINIME_HEAD","MINIME_WEAPON_SWORD","MINIME_WEAPON_DAGGER","MINIME_WEAPON_BOW","MINIME_WEAPON_TWO_HANDED","MINIME_WEAPON_BELL","MINIME_WEAPON_FAN"]],
    ];
@endphp

<div id="ProtoAll" style="min-height: 800px;width: 75%;margin-left: auto;margin-right: auto;overflow-y: scroll">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="m-4" style="display: flex;justify-content: center">
        <form class="example" action="{{ url('protoAll_name') }}" style="max-width: 300px">
            @csrf
            <input type="text" placeholder="Item Name" name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        <form class="example" action="{{ url('protoAll_vnum') }}" style="max-width: 300px">
            @csrf
            <input type="text" placeholder="Item Vnum" name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>

    <div style=";display: flex;flex-flow: row wrap;">
        <div class="dropdown">
            <button class="dropbtn">{{ __('messages.weapon') }}</button>
            <div class="dropdown-content">
                <a href="{{ url('protoAll_1_0_0') }}" class="dropdown-item">{{ __('messages.sword') }}</a>
                <a href="{{ url('protoAll_1_1_0') }}" class="dropdown-item">{{ __('messages.dagger') }}</a>
                <a href="{{ url('protoAll_1_2_0') }}" class="dropdown-item">{{ __('messages.bow') }}</a>
                <a href="{{ url('protoAll_1_3_0') }}" class="dropdown-item">{{ __('messages.2hand') }}</a>
                <a href="{{ url('protoAll_1_4_0') }}" class="dropdown-item">{{ __('messages.bell') }}</a>
                <a href="{{ url('protoAll_1_5_0') }}" class="dropdown-item">{{ __('messages.fan') }}</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">{{ __('messages.body') }}</button>
            <div class="dropdown-content">
                <a href="{{ url('protoAll_2_0_1') }}" class="dropdown-item">{{ __('messages.warrior') }}</a>
                <a href="{{ url('protoAll_2_0_2') }}" class="dropdown-item">{{ __('messages.ninja') }}</a>
                <a href="{{ url('protoAll_2_0_3') }}" class="dropdown-item">{{ __('messages.sura') }}</a>
                <a href="{{ url('protoAll_2_0_4') }}" class="dropdown-item">{{ __('messages.shaman') }}</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">{{ __('messages.helmet') }}</button>
            <div class="dropdown-content">
                <a href="{{ url('protoAll_2_1_1') }}" class="dropdown-item">{{ __('messages.warrior') }}</a>
                <a href="{{ url('protoAll_2_1_2') }}" class="dropdown-item">{{ __('messages.ninja') }}</a>
                <a href="{{ url('protoAll_2_1_3') }}" class="dropdown-item">{{ __('messages.sura') }}</a>
                <a href="{{ url('protoAll_2_1_4') }}" class="dropdown-item">{{ __('messages.shaman') }}</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">{{ __('messages.equipment') }}</button>
            <div class="dropdown-content">
                <a href="{{ url('protoAll_2_2_0') }}" class="dropdown-item">{{ __('messages.shield') }}</a>
                <a href="{{ url('protoAll_2_3_0') }}" class="dropdown-item">{{ __('messages.arm') }}</a>
                <a href="{{ url('protoAll_2_4_0') }}" class="dropdown-item">{{ __('messages.foot') }}</a>
                <a href="{{ url('protoAll_2_5_0') }}" class="dropdown-item">{{ __('messages.neck') }}</a>
                <a href="{{ url('protoAll_2_6_0') }}" class="dropdown-item">{{ __('messages.earring') }}</a>
            </div>
        </div>

        @foreach($Types as $key => $type)
            <div class="dropdown">
                <button class="dropbtn">{{ $type[0] }}</button>
                <div class="dropdown-content">
                    @for ($x = 0; $x <= $type[2]; $x++)
                        <a href="{{ url('protoAll_'.$type[1].'_'.$x.'_0') }}" class="dropdown-item">{{' Sub:'.$x}}</a>
                    @endfor
                </div>
            </div>
        @endforeach

    </div>


    <div class="row">
        @if($ProtoData && is_object($ProtoData))

            @foreach($ProtoData as $key => $data)
                @php
                    if (App::getLocale() == "de")
                        $title = $data->locale_name_de;
                    elseif(App::getLocale() == "en")
                        $title = $data->locale_name_en;
                    else
                        $title = $data->locale_name_en;
                    if($data->type <= 2)
                        $iconVnum = substr_replace($data->vnum, '0', -1, 1);
                    else
                        $iconVnum = $data->vnum
                @endphp
                @if($data->vnum > 2)
                    <div class="col-sm-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{$title}}</h5>
                                <p class="card-text">
                                @if (file_exists(public_path('images/proto/'.$iconVnum.'.png')))
                                    <th><img src="{{ asset('images/proto/'.$iconVnum.'.png') }}" style="width: 40px"
                                             class="image" title=" {{ $title }}"></th>
                                @else
                                    <th><img src="{{ asset('images/proto/no_image.png') }}" style="width: 40px"></th>
                                @endif
                                <br>
                                @if(isset($isGm) and $isGm==true)
                                    {{'Type:'.$data->type." Sub:".$data->subtype}}
                                    <br>
                                    {{'Vnum:'.$data->vnum}}
                                    @endif
                                    </p>
                                    <a href="{{ url('detailview_'.$data->vnum)}}"
                                       class="btn btn-primary">{{ __('messages.more') }}</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
</div>
<style>
    /* Style The Dropdown Button */
    .dropbtn {
        background-color: gray;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        border-radius: 12px;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: gray;
        color: white;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        border-radius: 12px;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: white;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
        color: #b7934c;
        border-radius: 12px;
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {
        color: #b7934c;
    }

    #myBtn {
        display: none; /* Hidden by default */
        position: fixed; /* Fixed/sticky position */
        bottom: 20px; /* Place the button at the bottom of the page */
        right: 30px; /* Place the button 30px from the right */
        z-index: 99; /* Make sure it does not overlap */
        border: none; /* Remove borders */
        outline: none; /* Remove outline */
        background-color: red; /* Set a background color */
        color: white; /* Text color */
        cursor: pointer; /* Add a mouse pointer on hover */
        padding: 15px; /* Some padding */
        border-radius: 10px; /* Rounded corners */
        font-size: 18px; /* Increase font size */
    }

    #myBtn:hover {
        background-color: #555; /* Add a dark-grey background on hover */
    }

    * {
        box-sizing: border-box;
    }

    form.example input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        float: left;
        width: 80%;
        background: #f1f1f1;
    }

    form.example button {
        float: left;
        width: 20%;
        padding: 10px;
        background: #2196F3;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
    }

    form.example button:hover {
        background: #0b7dda;
    }

    form.example::after {
        content: "";
        clear: both;
        display: table;
    }
</style>
<script>
    mybutton = document.getElementById("myBtn");
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>
