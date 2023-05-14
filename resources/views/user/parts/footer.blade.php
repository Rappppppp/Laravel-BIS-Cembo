<footer class="page-footer">
    <div class="jumbotron jumbotron-footer">
        <div class="container text-white my-3">
            <form id="form_message" method="post">
                <div class="row pb-3">
                    <h5 class="col message">Message us</h5>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
                <div class="row pb-3">
                    <input class="col-md-4  message rounded" type="text" placeholder="Title">
                    <div class="col-md-6 btn-contact">
                        <button type="button" class="btn btn-primary p-3 px-5">Contact Site Support</button>
                    </div>
                    <div class="col text-right mr-5">
                        <h5>Contact us</h5>
                        <a class="col-md-2" href="#"><img src="{{ asset('storage/images/Gmail-logo.png') }}" style="width: 3rem;" alt=""></a>
                    </div>
                </div>
                <div class="row pb-3">
                    <textarea class="col-md-4 message rounded" type="text" placeholder="Message" rows="5" cols="50"
                        name="message"></textarea>
                    <div class="col-md-6 text-center"></div>
                    <div class="col text-right mr-5">
                        <h5>Follow us</h5>
                        <a class="col-md-2" href="#"><img src="{{ asset('storage/images/Facebook-logo.png') }}" style="width: 3rem;"
                                alt=""></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 message-btn">
                        <input type="text" id="date_message" name="date_message" class="d-none">
                        <input type="text" id="time_message" name="time_message" class="d-none">
                        <input type="hidden" name="action" id="action" />
                        <button class="btn btn-primary px-4 message" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container-fluid" id="footer-footer">
        <div class="container" id="bottom">
            <p class="float-md-left">Made possible by UMak Students</p>
            <p class="float-md-right">Copyright &copy; 2022 Management Website by Cembo</p>
        </div>
    </div>
</footer>