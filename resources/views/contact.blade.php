@extends('includes.master')
@section('content')


    <section style="background: url({{url('/')}}/assets/images/{{$settings[0]->background}}) no-repeat center center; background-size: cover;">
        <div class="row" style="background-color:rgba(0,0,0,0.7);">

            <div style="margin: 3% 0px 3% 0px;">
                <div class="text-center" style="color: #FFF;padding: 20px;">
                    <h1>Contact</h1>
                </div>
            </div>

        </div>
    </section>

    <div id="wrapper" class="go-section">
        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    <div class="container">
                        <!-- Form Name -->
                        <h3 class="text-center">Get in contact with us</h3>
                        <hr>

                        <form id="contform" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="to" value="{{$pagedata->contact_email}}">
                            <!-- Success message -->
                            @if(Session::has('cmail'))
                            <div class="alert alert-success" role="alert" id="success_message">
                                {{ Session::get('cmail') }}
                            </div>
                            @endif
                            <!-- Text input-->
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input name="Name" placeholder="Name" class="form-control" type="text" required>
                                    <p id="nameError" class="errorMsg"></p>
                                </div>

                                <div class="form-group col-md-6">
                                    <input name="Email" placeholder="Email" class="form-control"  type="email" required>
                                    <p id="emailError" class="errorMsg"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input name="Phone" placeholder="Phone" pattern= "[0-9]{1.35}" class="form-control"  type="text" required>
                                    <p id="phoneError" class="errorMsg"></p>
                                </div>

                                <div class="form-group col-md-6">
                                    <select name="department" class="form-control selectpicker" required>
                                        <option value="">Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <p id="departmentError" class="errorMsg"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" placeholder="Message" name="message" rows="8" required></textarea>
                                    <p id="messageError" class="errorMsg"></p>
                                </div>
                            </div>
                            @php
                             $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

                             $string = substr(str_shuffle($chars), 0, 6);
                            @endphp
                               <div class="form-group col-md-12" id="capcha">
                                <h5 class="text-center">Fill This Field</h5>
                                <div class="col-md-5">
                                    <input style="text-align: center;" type="text" class="form-control" id="str1" value="{{$string}}" disabled="">
                                </div>
                                <div class="col-md-2" style="height: 100%; margin-top: 13px;">
                                    <h1 class="text-center">=</h1>
                                 </div>
                                <div class="col-md-5">
                                    <input style="text-align: center;" type="text" class="form-control" id="str2" value="">
                                </div>
                               </div>
                            <div id="resp"></div>
                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-5 control-label"></label>
                                <div class="col-md-2">
                                    <button type="submit" class="button style-10" >Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


@stop

@section('footer')
<script type="text/javascript">
    $("#contform").submit( function () {
        var str1 = $("#str1").val();
        var str2 = $("#str2").val();
        if(str1 == str2)
        {
            $("#contform").attr("action", "{{route('front.contact.submit')}}");
            return true;
        }
        else{
             return false;
        }
return false;
    });
</script>
@stop
