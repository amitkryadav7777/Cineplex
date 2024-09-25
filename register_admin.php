{% extends 'base.html' %}
{% load static %}

{% block title %}
<title>Cineplex | Home</title>
{% endblock %}

{% block style %}
<link rel="stylesheet" href={% static "styles/login.css" %} />
{% endblock %}

{% block content %}


<style>
    body {
        background-image: url(/static/images/cin.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<div class="container-fluid">
    <div class="row justify-content-start">
        <div class="col-12 col-md-10 col-lg-7">
            <form action="register_admin" method="POST" class="text-white cinema">
                {% csrf_token %}

                <h1>Registration as Admin<i aria-hidden="true"></i></h1>

                <div class="form-row">
                    <div class="form-group col-12">
                        <label class="form-label">Username</label>
                        <input class="form-control" type="text" placeholder="Username" name="username" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 col-12">
                        <label class="form-label">First Name</label>
                        <input class="form-control" type="text" placeholder="First Name" name="firstname" required>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label class="form-label">Last Name</label>
                        <input class="form-control" type="text" placeholder="Last Name" name="lastname">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label"><i class="fa fa-envelope-o" aria-hidden="true"></i> E-mail</label>
                    <input class="form-control" type="email" placeholder="@" name="email" required>
                </div>
                <div class="form-row">
               
                 
                </div>
                <div class="form-row">
                <div class="form-group col-md-6 col-12">
                    <label class="form-label"> Password</label>
                    <input class="form-control" type="password" placeholder="Password" name="password1" required>
                </div>
                <div class="form-group col-md-6 col-12">
                    <label class="form-label">Repeat Password</label>
                    <input class="form-control" type="password" placeholder="Password Again" name="password2" required>
                </div>
            </div>

                <input class="btn btn-primary btn-block btn-lg" type="submit" value="Register">
            </form>
        </div>
    </div>
</div>

{% for message in messages %}
<h4> {{message}} </h4>
{% endfor %}

{% endblock %}