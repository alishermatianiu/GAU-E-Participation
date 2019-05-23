
user_id = window.localStorage.user_id;
user_session_old = user_session = window.localStorage.user_session;
user_name = window.localStorage.user_name;
user_surname = window.localStorage.user_surname;
data_attachs = window.localStorage.data_attachs;
console.log(window.localStorage)
var app = new Framework7({
    // App root element
    root: '#app',
    // App Name
    name: 'My App',
    pushState: true,

    // App id
    id: 'com.myapp.test',
    template7Pages: true,
    // Enable swipe panel
    panel: {
        swipe: 'left',
    },
    // Add default routes
    routes:[
        {
            name: "create-petition",
            path: '/create-petititon/',
            componentUrl: './pages/create-petition.html',


        },
        {
            name:'main',
            path: '/',
            url : 'index.html',
            animate: false
        },
        {
            name: 'register',
            path:'/register/',
            url:'./pages/register.html',
            animate: false

        },
        {
            name: 'login',
            path:'/login/',
            url:'./pages/login.html',
            animate: false

        },
        {
            name: 'dashboard',
            path:'/dashboard/',
            url:'./pages/dashboard.html',
            animate: false

        },


    ],
    on: {
        init: function () {
        },
        pageBeforeIn: function(e) {
            if(e.name === "index"){
                e.stopPropagation();
            }

        },
        pageInit: function (page) {

            //Eğer localstore boş ise logine yönlendir
            //eğer session doldu ise (sunucudan gelen değre göre) onu logine yönlendir
            //inedexten geliyorsa ve session var ise dashboard a yönlendir
            //session var ise geri kalan sayfalarda gezinebilir.


            try{

                if((user_id && user_session) ){
                    if(page.name !== "login_page") {//index sayfasında ise
                        getList()//get fresh list and check user tooken navigeting through pages
                    }
                    if(page.name === "index"){//index sayfasında ise
                        app.views.main.router.navigate("/dashboard/");//dashboard a yönlendir
                    }
                }else{
                    app.views.main.router.navigate("/login/");


                }
            }catch (e) {
                app.views.main.router.navigate("/login/");
                user_id = window.localStorage.user_id = null;
                user_session = window.localStorage.user_session = null;
                user_name = window.localStorage.user_name = null;
                user_surname = window.localStorage.user_surname = null;
                data_attachs = window.localStorage.data_attachs = null;
            }

        },

    },
    methods: {

    }



});

var mainView = app.views.create('.view-main');
var $$ = Dom7;
var $ptrContent
$$(document).on('page:mounted', function (e) {
    console.log()
    onBackKeyDown()

        $ptrContent = $$('.ptr-content');
        $ptrContent.on('ptr:refresh', function (e) {
            app.preloader.show();
            app.ptr.done();
            setTimeout(function () {
                getList($ptrContent)

            }, 500);
             // or e.detail();
        });



})



function getList(){
    app.preloader.show();
    app.request.post('http://fnex.net/mobile_api/list.php', { student:user_id}, function (data) {

        data = JSON.parse(data);
        if(data){
            if(data.length>0){
                HTML = "";
                for(var item in data) {

                    HTML = HTML+'<li><a href="#">'+data[item].Body.substring(0,20)+'...</a></li>';
                }

                $$('.ptr-content').find('ul').html(HTML);
            }else{

            }

        }

        app.preloader.hide();
    },function(err){
        app.dialog.alert("Please Check Network Conncettion", "Error!");
        app.preloader.hide();
    });

}

function login(){
    app.preloader.show();

    var formData = app.form.convertToData('#login-form');

        app.request.post('http://fnex.net/mobile_api/login.php', { email:formData.email, password: formData.password }, function (data) {
            //user_id = window.localStorage.user_id = "1";
            //user_session = window.localStorage.user_session = "s1d351as35d1asd";
            //user_name = window.localStorage.user_name = "sait";
            //user_surname = window.localStorage.user_surname = "ikiz";
            data = JSON.parse(data);
            if(data.error){
                app.dialog.alert(data.message, "Error!")
            }else{
                if(data.user_id){
                    user_id = window.localStorage.user_id = data.user_id;
                    user_session = window.localStorage.user_session = data.token;
                    user_name = window.localStorage.user_name = data.user_name;
                    user_surname = window.localStorage.user_surname = data.user_surname;
                    data_attachs = window.localStorage.data_attachs = JSON.stringify(data.attach);
                    var notificationCallbackOnClose = app.notification.create({
                        icon: '',
                        title: data.message,
                        titleRightText: '',
                        subtitle: 'Welcome '+user_name+' '+user_surname,
                        text: "",
                        closeOnClick: true,
                        closeTimeout: 2000,
                        on: {

                        },
                    });
                    notificationCallbackOnClose.open();


                    app.views.main.router.navigate("/dashboard/");
                }
            }
            app.preloader.hide();


        },function(err){
            app.dialog.alert("Please Check Network Conncettion", "Error!");
            app.preloader.hide();

        });

}



function singup(){
    app.preloader.show();

    var formData = app.form.convertToData('#singup-form');

    app.request.post('http://fnex.net/mobile_api/signup.php',
        { email:formData.email, name: formData.name, surname: formData.surname, password: formData.password },
        function (data) {
        data = JSON.parse(data);
        if(data.error){
            app.dialog.alert(data.message, "Error!")
        }else{
            var notificationCallbackOnClose = app.notification.create({
                icon: '',
                title: data.message,
                titleRightText: '',
                subtitle: 'You have successfully created an account. You can now login.',
                text: "",
                closeOnClick: true,
                closeTimeout: 2000,
                on: {

                },
            });
            notificationCallbackOnClose.open();
            app.views.main.router.navigate("/login/");

        }
            app.preloader.hide();


    },function(err){
        app.dialog.alert("Please Check Network Conncettion", "Error!")
            app.preloader.hide();

        });

}


function sendPetition(){
    var formData = app.form.convertToData('#petition-form');
    app.dialog.confirm(
        "Are you sure ?",
        "Confirmation",
        function(){

            app.request.post('http://fnex.net/mobile_api/create.php',
                { student:user_id,body:formData.message,category:formData.category },
                function (data) {
                    data = JSON.parse(data);
                    if(data.error){
                        app.dialog.alert(data.message, "Error!")
                    }else{
                        var notificationCallbackOnClose = app.notification.create({
                            icon: '',
                            title: data.message,
                            titleRightText: '',
                            subtitle: 'The problem has been successfully sent.',
                            text: "",
                            closeOnClick: true,
                            closeTimeout: 2000,
                            on: {

                            },
                        });
                        notificationCallbackOnClose.open();
                        app.views.main.router.navigate("/dashboard/");
                    }


                },function(err){
                    app.dialog.alert("Please Check Network Conncettion", "Error!")
                });



        }, function(){

        })


}

function logout(){
    app.views.main.router.navigate("/login/");
    window.localStorage.clear()
    user_id = window.localStorage.user_id;
    user_session = window.localStorage.user_session;
    user_name = window.localStorage.user_name;
    user_surname = window.localStorage.user_surname;
    data_attachs = window.localStorage.data_attachs;
}




function onDeviceReady() {
    document.addEventListener('backbutton', onBackKeyDown, false);
    return false;
}

function onBackKeyDown() {
    console.log()
    mainView.router.back();

}

onDeviceReady()