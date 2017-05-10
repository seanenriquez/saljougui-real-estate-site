$(document).ready(function() {
   setBindings();
});

function setBindings() {      
    
    $("nav .navbar-nav a").click(function(e){
        
        e.preventDefault();
        
        var sectionID = e.currentTarget.id + "_marker";
       
        $("html,body").animate({
            scrollTop: $("#" + sectionID).offset().top-70
            
        }, 1000)
        
    })
}

function throttle(ms, callback) {
    var timer, lastCall=0;

    return function() {
        var now = new Date().getTime(),
            diff = now - lastCall;
        console.log(diff, now, lastCall);
        if (diff >= ms) {
            console.log("Call callback!");
            lastCall = now;
            callback.apply(this, arguments);
        }
    };
}

this.start = function() {
    // wrap around your callback
    $window.scroll(throttle(30, self.worker));
};