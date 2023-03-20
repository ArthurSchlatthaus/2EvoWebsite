<div id="Proto" style="width: 75%;margin-left: auto;margin-right: auto;">
    <div style=";display: flex">
        <div class="dropdown">
            <button class="dropbtn">{{ __('messages.weapon') }}</button>
            <div class="dropdown-content">
                <a href="{{ url('proto_1_0_0') }}" class="dropdown-item">{{ __('messages.sword') }}</a>
                <a href="{{ url('proto_1_1_0') }}" class="dropdown-item">{{ __('messages.dagger') }}</a>
                <a href="{{ url('proto_1_2_0') }}" class="dropdown-item">{{ __('messages.bow') }}</a>
                <a href="{{ url('proto_1_3_0') }}" class="dropdown-item">{{ __('messages.2hand') }}</a>
                <a href="{{ url('proto_1_4_0') }}" class="dropdown-item">{{ __('messages.bell') }}</a>
                <a href="{{ url('proto_1_5_0') }}" class="dropdown-item">{{ __('messages.fan') }}</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">{{ __('messages.body') }}</button>
            <div class="dropdown-content">
                <a href="{{ url('proto_2_0_1') }}" class="dropdown-item">{{ __('messages.warrior') }}</a>
                <a href="{{ url('proto_2_0_2') }}" class="dropdown-item">{{ __('messages.ninja') }}</a>
                <a href="{{ url('proto_2_0_3') }}" class="dropdown-item">{{ __('messages.sura') }}</a>
                <a href="{{ url('proto_2_0_4') }}" class="dropdown-item">{{ __('messages.shaman') }}</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">{{ __('messages.helmet') }}</button>
            <div class="dropdown-content">
                <a href="{{ url('proto_2_1_1') }}" class="dropdown-item">{{ __('messages.warrior') }}</a>
                <a href="{{ url('proto_2_1_2') }}" class="dropdown-item">{{ __('messages.ninja') }}</a>
                <a href="{{ url('proto_2_1_3') }}" class="dropdown-item">{{ __('messages.sura') }}</a>
                <a href="{{ url('proto_2_1_4') }}" class="dropdown-item">{{ __('messages.shaman') }}</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">{{ __('messages.equipment') }}</button>
            <div class="dropdown-content">
                <a href="{{ url('proto_2_2_0') }}" class="dropdown-item">{{ __('messages.shield') }}</a>
                <a href="{{ url('proto_2_3_0') }}" class="dropdown-item">{{ __('messages.arm') }}</a>
                <a href="{{ url('proto_2_4_0') }}" class="dropdown-item">{{ __('messages.foot') }}</a>
                <a href="{{ url('proto_2_5_0') }}" class="dropdown-item">{{ __('messages.neck') }}</a>
                <a href="{{ url('proto_2_6_0') }}" class="dropdown-item">{{ __('messages.earring') }}</a>
            </div>
        </div>
    </div>

    <table class="table" id="proto_page" style="width:100%;text-align: center;color:white;">
        <thead>
        <tr>
            <th scope="col">{{ __('messages.item') }}</th>
            <th scope="col">{{ __('messages.upp0') }}</th>
            <th scope="col">{{ __('messages.cnt0') }}</th>
            <th scope="col">{{ __('messages.upp1') }}</th>
            <th scope="col">{{ __('messages.cnt1') }}</th>
            <th scope="col">{{ __('messages.upp2') }}</th>
            <th scope="col">{{ __('messages.cnt2') }}</th>
            <th scope="col">{{ __('messages.gold') }}</th>
            <th scope="col">{{ __('messages.percent') }}</th>
            <th scope="col">{{ __('messages.item2') }}</th>
        </tr>
        </thead>
        <tbody>
        @if($ProtoData && is_object($ProtoData))

            @foreach($ProtoData as $key => $data)
                <tr>

                    @php
                        $iconVnum = substr_replace($data->vnum, '0', -1, 1);
                        $plus = substr($data->vnum, -1);
                        $plusResult = substr($data->refined_vnum, -1);
                        if (App::getLocale() == "de") {
                            $title = $data->locale_name_de;
                            if($data->refined_vnum > 1)
                                $refineTitle = App\Http\Controllers\ProtoController::readJSON(1,$data->refined_vnum);
                            if($data->vnum0 > 1)
                                $vnum0Title = App\Http\Controllers\ProtoController::readJSON(1,$data->vnum0);
                            if($data->vnum1 > 1)
                                $vnum1Title = App\Http\Controllers\ProtoController::readJSON(1,$data->vnum1);
                            if($data->vnum2 > 1)
                                $vnum2Title = App\Http\Controllers\ProtoController::readJSON(1,$data->vnum2);
                        }
                        elseif(App::getLocale() == "en") {
                            $title = $data->locale_name_en;
                            if($data->refined_vnum > 1)
                                $refineTitle = App\Http\Controllers\ProtoController::readJSON(0,$data->refined_vnum);
                            if($data->vnum0 > 1)
                                $vnum0Title = App\Http\Controllers\ProtoController::readJSON(0,$data->vnum0);
                            if($data->vnum1 > 1)
                                $vnum1Title = App\Http\Controllers\ProtoController::readJSON(0,$data->vnum1);
                            if($data->vnum2 > 1)
                                $vnum2Title = App\Http\Controllers\ProtoController::readJSON(0,$data->vnum2);
                        }
                        else {//default
                            $title = $data->locale_name_en;
                            if($data->refined_vnum > 1)
                                $refineTitle = App\Http\Controllers\ProtoController::readJSON(0,$data->refined_vnum);
                            if($data->vnum0 > 1)
                                $vnum0Title = App\Http\Controllers\ProtoController::readJSON(0,$data->vnum0);
                            if($data->vnum1 > 1)
                                $vnum1Title = App\Http\Controllers\ProtoController::readJSON(0,$data->vnum1);
                            if($data->vnum2 > 1)
                                $vnum2Title = App\Http\Controllers\ProtoController::readJSON(0,$data->vnum2);
                        }

                    @endphp
                    @if (file_exists(public_path('images/proto/'.$iconVnum.'.png')))
                        <th><img src="{{ asset('images/proto/'.$iconVnum.'.png') }}" style="width: 40px" class="image"
                                 title=" {{ $title }}">
                            +{{$plus}}
                        </th>
                    @else
                        <th><img src="{{ asset('images/proto/no_image.png') }}" style="width: 40px"></th>
                    @endif

                    @if (file_exists(public_path('images/proto/'.$data->vnum0.'.png')) && $data->vnum0 > 1)
                        <th style="padding-top: 25px"><img src="{{ asset('images/proto/'.$data->vnum0.'.png') }}"
                                                           style="width: 40px" title="{{$vnum0Title}}"></th>
                    @else
                        <th></th>
                    @endif
                    @if ( $data->count0 > 0)
                        <th style="padding-top: 35px">{{$data->count0}}</th>
                    @else
                        <th></th>
                    @endif
                    @if (file_exists(public_path('images/proto/'.$data->vnum1.'.png')) && $data->vnum1 > 1)
                        <th style="padding-top: 25px"><img src="{{ asset('images/proto/'.$data->vnum1.'.png') }}"
                                                           style="width: 40px" title="{{$vnum1Title}}"></th>
                    @else
                        <th></th>
                    @endif
                    @if ( $data->count1 > 0)
                        <th style="padding-top: 35px">{{$data->count1}}</th>
                    @else
                        <th></th>
                    @endif
                    @if (file_exists(public_path('images/proto/'.$data->vnum2.'.png'))&& $data->vnum2 > 1)
                        <th style="padding-top: 25px"><img src="{{ asset('images/proto/'.$data->vnum2.'.png') }}"
                                                           style="width: 40px" title="{{$vnum2Title}}"></th>
                    @else
                        <th></th>
                    @endif
                    @if ( $data->count2 > 0)
                        <th style="padding-top: 35px">{{$data->count2}}</th>
                    @else
                        <th></th>
                    @endif
                    @php
                        $data->cost = number_format($data->cost , 0, ',', '.');
                    @endphp
                    <th>{{$data->cost}}</th>
                    <th>{{$data->prob}}%</th>
                    @php
                        $iconRefined = substr_replace($data->refined_vnum, '0', -1, 1);
                    @endphp
                    @if (file_exists(public_path('images/proto/'.$iconRefined.'.png')))
                        <th><img src="{{ asset('images/proto/'.$iconRefined.'.png') }}" style="width: 40px "
                                 title=" {{ $refineTitle }}">
                            +{{$plusResult}}
                        </th>
                    @else
                        <th><img src="{{ asset('images/proto/no_image.png') }}" style="width: 40px"></th>
                    @endif
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

</div>
<style>
    table.dataTable tbody th {
        background-color: #121010;
        border-bottom: 1px solid white;
    }

    label {
        color: white;
    }

    .dataTables_wrapper .dataTables_length select {
        color: white;
    }

    .dataTables_wrapper .dataTables_filter input {
        color: white;
    }

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

</style>

<script>
    $(document).ready(function () {
        $('#proto_page').dataTable(
            {
                "iDisplayLength": 25,
                "ordering": false,
                //"searching": false,
                "aaSorting": [
                    [2, "desc"]
                ],
            }
        );
    });

</script>
