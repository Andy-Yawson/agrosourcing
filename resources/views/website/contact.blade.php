@extends('website.website-master')
@section('web-content')
    <main class="pt-5">
        <section class="section-pagetop bg-bread p-5">
            <div class="container">
                <div class="m-auto">
                    <h2 class="font-weight-light text-white mt-5">Contact Us</h2>
                </div>
            </div>
        </section>
        <section class="py-5 mt-5">
            <div class="container">
                <h2 class="font-weight-light mb-5 text-heading">Get In touch with us</h2>
                <div class="row ">
                    <div class="col-md-4 col-sm-12 col-xs-12 mb-5">
                        <div class="">
                            <h4 class="card-title text-uppercase font-weight-bold text-heading">Kindly drop us a line</h4>
                            <p class="card-text lead">Reach out to us either through the contact details below or by filling out the contact form and we will
                                get back to you immediately.</p>
                            <p class="card-text lead mb-1 font-weight-bold text-heading">Headquarters</p>
                            <table>
                                <tr>
                                    <td>
                                        Afienya-Ablekuma,
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="mt-1">Greater Accra Region, Ghana</p>
                                    </td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td>
                                        <i class="fa fa-mobile"></i> +233 24 383 1726 | +233 24 882 3936
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="mt-2"><i class="fa fa-envelope"></i> enquiries@agrosourcing.net</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12 mb-5">
                        @include('flash._notify')
                        <div>
                            <form method="post" action="{{ route('web.contact.post') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" placeholder="John Doe" name="name" required value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="John@email.com" name="email" required value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" class="form-control" placeholder="More Enquires" name="subject" required value="{{ old('subject') }}">
                                </div>
                                <div class="form-group">
                                    <label>Messages</label>
                                    <textarea class="form-control" rows="6" name="message" required>{{ old('message') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-envelope"></i> Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
