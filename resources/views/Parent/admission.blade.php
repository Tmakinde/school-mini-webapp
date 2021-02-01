@extends('Parent.layouts.master')

@section('title')
My School Web App | Portal
@endsection

@section('content')
<div class="container mt-5 pt-5" >
        <form>
                <h2><span class="mb-3">Student's Information</span></h2>
                <div class="form-row">
                        <div class="col-md-4 mb-3">
                                <label for="validationDefault01">FULL NAME OF CHILD</label>
                                <input type="text" class="form-control" id="validationDefault01" placeholder="FULL NAME OF CHILD" required>
                        </div>
                        <div class="col-md-4 mb-3">
                                <label for="validationDefault02">DATE OF BIRTH</label>
                                <input type="text" class="form-control" id="validationDefault02" placeholder="DATE OF BIRTH" required>
                        </div>
                        <div class="col-md-4 mb-3">
                                <label for="validationDefaultUsername">SEX</label>
                                <div class="input-group">
                                        <input type="text" class="form-control" id="validationDefaultUsername" placeholder="SEX" aria-describedby="inputGroupPrepend2" required>
                                </div>
                        </div>
                </div>
                <div class="form-row">
                        <div class="col-md-3 mb-3">
                                <label for="validationDefault01">STREET ADDRESS</label>
                                <input type="text" class="form-control" id="validationDefault01" placeholder="STREET ADDRESS" required>
                        </div>
                        <div class="col-md-3 mb-3">
                                <label for="validationDefault02">CITY</label>
                                <input type="text" class="form-control" id="validationDefault02" placeholder="CITY" required>
                        </div>
                        <div class="col-md-3 mb-3">
                                <label for="validationDefaultUsername">STATE</label>
                                <div class="input-group">
                                        <input type="text" class="form-control" id="validationDefaultUsername" placeholder="STATE" aria-describedby="inputGroupPrepend2" required>
                                </div>
                        </div>
                        <div class="col-md-3 mb-3">
                                <label for="validationDefault04">EMAIL ADDRESS</label>
                                <input type="text" class="form-control" id="validationDefault04" placeholder="EMAIL ADDRESS" required>
                        </div>
                </div>
                <h2><span class="mb-3">Parent's Information</span></h2>
                <div class="form-row">
                        <div class="col-md-4 mb-3">
                                <label for="validationDefault01">FATHER'S NAME</label>
                                <input type="text" class="form-control" id="validationDefault01" placeholder="FATHER'S NAME" required>
                        </div>
                        <div class="col-md-4 mb-3">
                                <label for="validationDefault02">MOTHER'S NAME</label>
                                <input type="text" class="form-control" id="validationDefault02" placeholder="MOTHER'S NAME" required>
                        </div>
                        <div class="col-md-4 mb-3">
                                <label for="validationDefaultUsername">OCCUPATION</label>
                                <div class="input-group">
                                        <input type="text" class="form-control" id="validationDefaultUsername" placeholder="OCCUPATION" aria-describedby="inputGroupPrepend2" required>
                                </div>
                        </div>
                </div>
                <div class="form-row">
                        <div class="col-md-6 mb-3">
                                <label for="validationDefault03">STREET ADDRESS</label>
                                <input type="text" class="form-control" id="validationDefault03" placeholder="STREET ADDRESS" required>
                        </div>
                        <div class="col-md-3 mb-3">
                                <label for="validationDefault04">PHONE NUMBER</label>
                                <input type="text" class="form-control" id="validationDefault04" placeholder="PHONE NUMBER" required>
                        </div>
                </div>
                <div class="form-group">
                        <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                <label class="form-check-label" for="invalidCheck2">
                                        <span style="padding-left:30px">Agree to terms and conditions</span>
                                </label>
                        </div>  
                </div>
                <button class="btn btn-primary" type="submit">Submit form</button>
        </form>
</div>
@endsection
@section('scripts')
  <script>
    $('#body').css('background-color','purple')
  </script>
@parent
@endsection