<button onclick="topFunction()" id="myBtn" title="Go to top" style="display: none">Top</button>
<div>
    <a class="btn btn-outline-warning btn-lg" href="/mob-drop-metin">Metin</a>
    <a class="btn btn-outline-warning btn-lg" href="/mob-drop-monster">Monster</a>
    <a class="btn btn-outline-warning btn-lg" href="/mob-drop-boss">Boss</a>
</div>

@if(!empty($MobData))
    <div class="row">
        @foreach($MobData as $key => $data)
            @if(!empty($data))
                <div class="col-sm-4 p-4">
                    <div class="card border-warning bg-transparent">
                        <div class="card-body" style="color: #b7934c">
                            @if (App::getLocale() == "de")
                                <h5 class="card-title text-center">{{App\Http\Controllers\ProtoController::readMOBJSON(1,$data[0])}}</h5>
                                <p class="card-text text-center">
                                @for($i = 1; $i < sizeof($data); $i++)
                                    <a>~{{App\Http\Controllers\ProtoController::readJSON(1,$data[$i])}}~</a><br>
                                @endfor

                            @elseif(App::getLocale() == "en")
                                <h5 class="card-title text-center">{{App\Http\Controllers\ProtoController::readMOBJSON(0,$data[0])}}</h5>
                                <p class="card-text text-center">
                                @for($i = 1; $i < sizeof($data); $i++)
                                    <a>~{{App\Http\Controllers\ProtoController::readJSON(0,$data[$i])}}~</a><br>
                                @endfor
                            @else
                                <h5 class="card-title text-center">{{App\Http\Controllers\ProtoController::readMOBJSON(0,$data[0])}}</h5>
                                <p class="card-text text-center">
                                @for($i = 1; $i < sizeof($data); $i++)
                                    <a>~{{App\Http\Controllers\ProtoController::readJSON(0,$data[$i])}}~</a><br>
                                @endfor
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endif
<style>
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

    $(document).ready(function(){
        window.scroll(0,720);
    });
</script>
