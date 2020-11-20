@extends('admin.includes.master-admin')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row" id="main">

                <!-- Page Heading -->
                <div class="go-title">

                    <h3>Language Setting</h3>
                    <div class="go-line"></div>
                </div>
                <!-- Page Content -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="res">
                            @if(Session::has('message'))
                                <div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                            @if(Session::has('error'))
                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                        </div>
                        <form method="POST" action="{{route('admin-lang-update')}}" class="form-horizontal form-label-left"> 
                            {{csrf_field()}}

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Home Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="home" placeholder="Home" required="required" type="text" value="{{$data->home}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> About Us Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="about" placeholder="About Us Text" required="required" type="text" value="{{$data->about}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Faq Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="faq" placeholder="Faq Text" required="required" type="text" value="{{$data->faq}}">
                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Contact Us Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="contact" placeholder="Contact us Text" required="required" type="text" value="{{$data->contact}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Search Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="dashboard" placeholder="Search Text" required="required" type="text" value="{{$data->dashboard}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Search Product Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="sucp" placeholder="Search Product Text" required="required" type="text" value="{{$data->sucp}}">
                                </div>
                            </div>                        

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Search Result Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="logout" placeholder="Search Result Text" required="required" type="text" value="{{$data->logout}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Address Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="fht" placeholder="Address Text" required="required" type="text" value="{{$data->fht}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Street Address Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="fh" placeholder="Street Address Text" required="required" type="text" value="{{$data->fh}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Phone Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="h" placeholder="Phone Text" required="required" type="text" value="{{$data->h}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Fax Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="vt" placeholder="Fax Text" required="required" type="text" value="{{$data->vt}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Email Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="gt" placeholder="Email Text" required="required" type="text" value="{{$data->gt}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Subscription Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="vdn" placeholder="Subscription Text" required="required" type="text" value="{{$data->vdn}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Enter Email Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="blog" placeholder="Enter Email Text" required="required" type="text" value="{{$data->blog}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Subscribe Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="blogs" placeholder="Subscribe Text" required="required" type="text" value="{{$data->blogs}}">
                                </div>
                            </div> 

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Contact Title Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="fpw" placeholder="Contact Title Text" required="required" type="text" value="{{$data->fpw}}">
                                </div>
                            </div> 

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Contact Name Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="con" placeholder="Contact Name Text" required="required" type="text" value="{{$data->con}}">
                                </div>
                            </div>       

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Contact Email Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="cop" placeholder="Contact Email Text" required="required" type="text" value="{{$data->cop}}">
                                </div>
                            </div>  

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Contact Phone Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="coe" placeholder="Contact Phone Text" required="required" type="text" value="{{$data->coe}}">
                                </div>
                            </div>  

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Contact Select Gender Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="cor" placeholder="Contact Select Gender Text" required="required" type="text" value="{{$data->cor}}">
                                </div>
                            </div>  

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Contact Male Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="signin" placeholder="Contact Male Text" required="required" type="text" value="{{$data->signin}}">
                                </div>
                            </div> 

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Contact Female Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="sie" placeholder="Contact Female Text" required="required" type="text" value="{{$data->sie}}">
                                </div>
                            </div>                             

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Contact Others Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="spe" placeholder="Contact Others Text" required="required" type="text" value="{{$data->spe}}">
                                </div>
                            </div> 

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Contact Message Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="signup" placeholder="Contact Message Text" required="required" type="text" value="{{$data->signup}}">
                                </div>
                            </div> 

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Contact Submit Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="suf" placeholder="Contact Submit Text" required="required" type="text" value="{{$data->suf}}">
                                </div>
                            </div> 



                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Feature Products Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="edit" placeholder="Feature Products Text" required="required" type="text" value="{{$data->edit}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Latest Products Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="reset" placeholder="Latest Products Text" required="required" type="text" value="{{$data->reset}}">
                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Popular Products Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="suph" placeholder="Popular Products Text" required="required" type="text" value="{{$data->suph}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> View Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="sup" placeholder="View Text" required="required" type="text" value="{{$data->sup}}">
                                </div>
                            </div>



                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> All Categories Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="cp" placeholder="All Categories Text" required="required" type="text" value="{{$data->cp}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Load More Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="np" placeholder="Load More Text" required="required" type="text" value="{{$data->np}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Product Not Found Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="lm" placeholder="Product Not Found Text" required="required" type="text" value="{{$data->lm}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Reviews Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="rds" placeholder="Reviews Text Text" required="required" type="text" value="{{$data->rds}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Show More Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="hcs" placeholder="Show More Text" required="required" type="text" value="{{$data->hcs}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Buy Now Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="lns" placeholder="Buy Now Text" required="required" type="text" value="{{$data->lns}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Share Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="vd" placeholder="Share Text" required="required" type="text" value="{{$data->vd}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Full Description Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="ston" placeholder="Full Description Text" required="required" type="text" value="{{$data->ston}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> No Review Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="rnp" placeholder="No Review Text" required="required" type="text" value="{{$data->rnp}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Related Products Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="chnp" placeholder="Related Products Text" required="required" type="text" value="{{$data->chnp}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Write a Review Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="bgs" placeholder="Write a Review" required="required" type="text" value="{{$data->bgs}}">
                                </div>
                            </div>                            

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Submit Review Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="bg" placeholder="Submit Review Text" required="required" type="text" value="{{$data->bg}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Review Rating Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="s" placeholder="Review Rating Text" required="required" type="text" value="{{$data->s}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Review Name Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="supl" placeholder="Review Name Text" required="required" type="text" value="{{$data->supl}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Review Email Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="fl" placeholder="Review Email Text" required="required" type="text" value="{{$data->fl}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook"> Review Description Text <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="sm" placeholder="Review Description Text" required="required" type="text" value="{{$data->sm}}">
                                </div>
                            </div>                            
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <!--  <button type="submit" class="btn btn-primary">Cancel</button> -->
                                    <button type="submit" class="btn btn-success btn-block">Update Language Settings</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@stop

@section('footer')

@stop