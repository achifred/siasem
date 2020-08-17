gsap.from(".intro", { duration: 1, y: -100, scale: 2 });
gsap.from(".btnl", { duration: 1, x: 300, delay: 1 });
gsap.from(".contactbtn", { duration: 1, x: -300, ease: "bounce", delay: 1 });
gsap.to(".btnl", { duration: 1, y: 2, ease: "power1.inOut", repeat: -1 });
gsap.from(".intro-headline", {
    duration: 2,
    x: -100,
    ease: "power1",
    opacity: 0.5,
    scale: 0.2,
    delay: 1
});
gsap.from(".products", { duration: 1, y: -100, scale: 0.2 });
gsap.to(".addcartbtn", {
    duration: 1,
    y: 1,
    ease: "power1.inOut",
    repeat: -1
});
// gsap.from(".intro-img", { duration: 3, x: 300, opacity: 0, scale: 0.5 });
// gsap.to(".intro-img", {
//     duration: 5,
//     y: 10,

//     ease: "power1.inOut",
//     repeat: -1
// });

AOS.init({
    offset: 120,
    delay: 1000
});
//window.onload = console.log(process.env.MIX_PUSHER_APP_KEY);
