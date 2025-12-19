@extends('layouts.app')

@section('title', 'Home')

@section('content')
@php
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
$locale = app()->getLocale();
@endphp
<style>
    /*----onscroll animation start-----*/
.in-view.anim-delay2 {
  -webkit-transition-delay: 0.4s !important;
}

.in-view.anim-delay3 {
  -webkit-transition-delay: 0.8s !important;
}

.in-view.anim-delay4 {
  -webkit-transition-delay: 1.2s !important;
}

.in-view.anim-delay5 {
  -webkit-transition-delay: 1.6s !important;
}

.in-view.anim-delay6 {
  -webkit-transition-delay: 2s !important;
}

.animation-element.slide-top {
  opacity: 0;
  transition: all 1000ms cubic-bezier(0.11, 0.16, 0.43, 0.86);
  -moz-transform: translate3d(0px, -60px, 0px);
  -webkit-transform: translate3d(0px, -60px, 0px);
  -o-transform: translate(0px, -60px);
  -ms-transform: translate(0px, -60px);
  transform: translate3d(0px, -60px, 0px);
}

.animation-element.fadein {
  opacity: 0;
  transition: all 1000ms cubic-bezier(0.11, 0.16, 0.43, 0.86);
}

.animation-element.slide-bottom {
  opacity: 0;
  transition: all 1000ms cubic-bezier(0.11, 0.16, 0.43, 0.86);
  -moz-transform: translate3d(0px, 60px, 0px);
  -webkit-transform: translate3d(0px, 60px, 0px);
  -o-transform: translate(0px, 60px);
  -ms-transform: translate(0px, 60px);
  transform: translate3d(0px, 60px, 0px);
}

.animation-element.slide-left {
  opacity: 0;
  transition: all 1000ms cubic-bezier(0.11, 0.16, 0.43, 0.86);
  -moz-transform: translate3d(-50px, 0, 0);
  -webkit-transform: translate3d(-50px, 0, 0);
  -o-transform: translate(-50px, 0);
  -ms-transform: translate(-50px, 0);
  transform: translate3d(-50px, 0, 0);
}

.animation-element.slide-right {
  opacity: 0;
  transition: all 1000ms cubic-bezier(0.11, 0.16, 0.43, 0.86);
  -moz-transform: translate3d(50px, 0, 0);
  -webkit-transform: translate3d(50px, 0, 0);
  -o-transform: translate(50px, 0);
  -ms-transform: translate(50px, 0);
  transform: translate3d(50px, 0, 0);
}

.animation-element.slide-left.in-view,
.animation-element.slide-top.in-view,
.animation-element.slide-right.in-view,
.animation-element.slide-bottom.in-view,
.animation-element.fadein.in-view {
  opacity: 1;
  -moz-transform: translate3d(0px, 0px, 0px);
  -webkit-transform: translate3d(0px, 0px, 0px);
  -o-transform: translate(0px, 0px);
  -ms-transform: translate(0px, 0px);
  transform: translate3d(0px, 0px, 0px);
}

.events-wrap{
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    /* max-height: 300px; */
    overflow: hidden;
    align-items: stretch;
    justify-content: flex-end;
}
.container {
  
max-width: 1200px;
  
margin: 50px auto;
  
gap: 40px;
}

.column {
  flex: 1;
}

.column.left, .column.right {
  max-width: 300px;
  padding-right: 30px;
  overflow-y: auto;
  max-height: 570px;
}
section.events h3 {font-family: "Titillium Web", sans-serif;font-weight: 600;font-style: normal;line-height: 30px;font-size: 20px;}

section.events p {
    font-family: "Titillium Web", sans-serif;
    font-weight: 400;
    font-style: normal;
    color: #222222;
    opacity: 0.7;
    font-size: 14px;
}
.column.center {
  /* width: 50%; */
  text-align: left;
  /* align-self: end; */
}

h2 {
  font-size: 1rem;
  font-weight: 700;
  margin-bottom: 20px;
  text-transform: uppercase;
  color: #111;
}

.card {
  margin-bottom: 25px;
}

.meta {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 5px;
}

.tag {
  font-size: 0.7rem;
  padding: 2px 8px;
  border-radius: 3px;
  color: #fff;
}

.tech { background: #DD3030; }         /* red */
.entertainment { background: #DD3030; } /* darker red */
.business { background: #DD3030; }      /* orange */
.politics { background: #DD3030; }      /* deep orange */
.health { background: #DD3030; }        /* red again for consistency */

.date {
  font-size: 0.7rem;
  color: #DD3030;
}

h3 {
  font-size: 0.9rem;
  margin: 5px 0;
}

p {
  font-size: 0.8rem;
  color: #555;
  line-height: 1.4;
}

.featured {
  background: #d9d9d9;
  padding: 0;
  border-radius: 6px;
  text-align: left;
  height: 100%;
  position: relative;
  overflow: hidden;
  min-height: 400px;
}

.featured-overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.6) 50%, rgba(0, 0, 0, 0) 100%);
  padding: 40px;
  z-index: 1;
}

.featured-content {
  position: relative;
  z-index: 2;
}

.featured h2 {
  font-size: 0.65rem;
  color: #fff;
  margin: 10px 0;
}

.featured p {
  font-size: 0.85rem;
  color: #fff !important;
  opacity: 0.7 !important;
}
/* === Amaippai Thiralvom Section === */

.amaippai-wrapper {
  background: #f4f4f4;
  padding: 20px 60px;
  font-family: "Inter", sans-serif;
  color: #222;
}

/* Top quote area layout */
.amaippai-quote-area {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 40px;
  margin-bottom: 60px;
}

.amaippai-quote-left {
  flex: 1 1 65%;
}

.amaippai-quote-right {
  flex: 1 1 25%;
  text-align: right;
}

.amaippai-book-wrapper {
  position: relative;
  display: inline-block;
  overflow: hidden;
  border-radius: 12px;
}

.amaippai-image {
  width: 320px;
  border-radius: 12px;
  transition: transform 0.3s ease, filter 0.3s ease;
  display: block;
}

.amaippai-book-wrapper:hover .amaippai-image {
  transform: scale(1.05);
  filter: blur(2px);
}

.amaippai-book-wrapper .amaippai-img-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.6);
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: opacity 0.3s ease;
  border-radius: 12px;
}

.amaippai-book-wrapper:hover .amaippai-img-overlay {
  opacity: 1;
}

.amaippai-book-wrapper .amaippai-buy-btn {
  transform: translateY(10px);
  opacity: 0;
}

.amaippai-book-wrapper:hover .amaippai-buy-btn {
  transform: translateY(0);
  opacity: 1;
}

/* Title */
.amaippai-title {
  font-size: 2rem;
  font-weight: 700;
  color: #000;
  margin-bottom: 25px;
  text-align: center;
  text-transform:capitalize;
}

/* Quote text */
.amaippai-quote-block {
  position: relative;
  /* margin-left: 40px; */
}

.amaippai-quote-mark {
  font-size: 4rem;
  color: #e07a7a;
  position: absolute;
  left: -40px;
  top: -10px;
}

.amaippai-quote-text {
  font-size: 40px;
  line-height: 1.4;
  color: #222222;
  margin: 0;
  /* max-width: 600px; */
  font-family: 'Titillium Web';
  font-weight: 500;
  padding-left: 100px;
}

/* Author */
.amaippai-author {
  color: #DD3030;
  font-weight: 600;
  margin-top: 20px;
  margin-left: 40px;
  font-size: 30px;
  text-align: end;
}

/* === News cards below === */
.amaippai-news-card {
    display: flex;
    gap: 10px;
}
.amaippai-news-row {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 10px;
}

.amaippai-news-card {
  width: 23%;
}

.amaippai-img-wrapper {
  position: relative;
  width: 129px;
  height: 136px;
  overflow: hidden;
  border-radius: 6px;
}

.amaippai-news-img {
  width: 100%;
  height: 100%;
  border-radius: 6px;
  object-fit: cover;
  transition: transform 0.3s ease, filter 0.3s ease;
}

.amaippai-img-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.6);
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: opacity 0.3s ease;
  border-radius: 6px;
}

.amaippai-img-wrapper:hover .amaippai-img-overlay {
  opacity: 1;
}

.amaippai-img-wrapper:hover .amaippai-news-img {
  transform: scale(1.1);
  filter: blur(2px);
}

.amaippai-buy-btn {
  background: #DD3030;
  color: #fff;
  padding: 10px 20px;
  border-radius: 6px;
  text-decoration: none;
  font-weight: 600;
  font-size: 14px;
  transition: all 0.3s ease;
  transform: translateY(10px);
  opacity: 0;
}

.amaippai-img-wrapper:hover .amaippai-buy-btn {
  transform: translateY(0);
  opacity: 1;
}

.amaippai-buy-btn:hover {
  background: #c02929;
  transform: translateY(0) scale(1.05);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

.amaippai-news-meta {
  /* display: flex; */
  gap: 10px;
  align-items: center;
  margin-top: 8px;
}

.amaippai-news-tag {
  font-size: 14px;
  padding: 4px 6px;
  border-radius: 3px;
  color: #fff;
  font-weight: 500;
}

.amaippai-health { color: #DD3030; }
.amaippai-entertainment { color: #DD3030; }
.amaippai-politics { color: #DD3030; }

.amaippai-news-date {
  font-size: 0.8rem;
  color: #222222;
  opacity: 0.5;
}

.amaippai-news-title {
  font-size: 14px;
  color: #222;
  font-weight: 500;
  line-height: 1.4;
  margin-top: 5px;
}

/* Responsive layout */
@media (max-width: 900px) {
  .amaippai-quote-area {
    flex-direction: column;
    text-align: center;
    gap: 10px;
  }

  .amaippai-quote-right {
    text-align: center;
    margin-top: 30px;
  }

  .amaippai-image {
    width: 250px;
  }

  .amaippai-news-row {
    flex-direction: column;
    align-items: center;
  }

  .amaippai-news-card {
    width: 90%;
  }
}



section.members-section {
    background-image: url({{ asset('assets/images/images/members-bg.png') }});
    background-size: cover;
    padding: 10px 0;
}
.members-wrap h2 {
    text-transform: capitalize;
    font-size: 30px;
    text-align: center;
    padding-bottom: 20px;
}

.members-top-row {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 60px;
}

.s-member-wrap {
    width: 23%;
}
.s-member-wrap:hover .member-cont{
    background-color:#d92526;
    box-shadow: 0px 4px 5px 2px rgba(0, 0, 0, 0.25);
}
.members-bottom-row {
    display: flex;
    justify-content: center;
    gap: 20px;
}
.member-img {
    text-align: center;
}
.member-img img{
    margin:auto;
}
.member-cont {
    background: #006A9C;
    border-radius: 5px;
    text-align: center;
    padding: 5px 10px 6px;
    color: #fff;
    transition:all 0.5s ease;
}
.member-cont h6 {
    font-size: 20px;
    margin: 0;
    font-weight:900;
    /* line-height: 30px; */
}
.member-cont span {
  color: #D0D0D0;
  display: block;
  margin-bottom:8px;
}
.members-s-media {
    display: flex;
    justify-content: center;
    align-items:center;
    gap: 14px;
}

/* === Historic Milestones Slider === */

.milestone-slider-section {
  background-image: url({{ asset('assets/images/images/milestone-bg.png') }});
  background-size: cover;
  padding: 80px 60px;
  text-align: center;
  font-family: "Inter", sans-serif;
  color: #222;
}

.milestone-slider-title {
  font-size: 2.0rem;
  font-weight: 700;
  margin-bottom: 40px;
  color: #111;
  text-transform: capitalize;
}

/* Timeline years (buttons) */
.milestone-slider-years {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 35px;
  flex-wrap: wrap;
  margin-bottom: 40px;
}

.milestone-slider-year {
  background: transparent;
  border: none;
  color: #777;
  font-size: 1rem;
  padding: 6px 14px;
  border-radius: 30px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.milestone-slider-year.active {
  color: #007bff;
  border: 1px solid #007bff;
  background-color: rgba(0, 123, 255, 0.1);
  font-weight: 600;
}

/* Slider content */
.milestone-slider-content {
  max-width: 700px;
  margin: 0 auto;
  position: relative;
}

.milestone-slider-item {
  display: none;
  animation: fadeIn 0.5s ease-in-out;
}

.milestone-slider-item.active {
  display: block;
}

.milestone-slider-image {
  width: 100%;
  border-radius: 8px;
  margin-bottom: 20px;
}

.milestone-slider-caption {
  font-size: 1rem;
  font-weight: 600;
  color: #111;
  margin-bottom: 10px;
}

.milestone-slider-text {
  font-size: 20px;
  color: #222222;
  line-height: 1.6;
  margin: 0 auto;
  max-width: 650px;
  text-align: justify;
}

/* Animation */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Responsive */
@media (max-width: 768px) {
  .milestone-slider-section {
    padding: 30px 20px;
  }

  .milestone-slider-years {
    gap: 20px;
  }

  .milestone-slider-text {
    font-size: 0.9rem;
  }
}


.exclusive-section .container {
  display: flex;
  background: #fff;
  overflow: hidden;
  align-items: stretch;
  gap: 20px;
  justify-content: space-between;
}

.exclusive-section .featured {
  position: relative;
  width: 60%;
}

.exclusive-section .featured img {
  width: auto;
  /* height: 600px; */
  display: block;
}

.exclusive-section .play-btn {
  position: absolute;
  left: 30px;
  bottom: 30px;
  background: #d91921;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.exclusive-section .play-btn::before {
  content: "";
  color: white;
  font-size: 20px;
}

.exclusive-section .tag {
  position: absolute;
  bottom: 0;
  left: 0;
  background: #d91921;
  color: white;
  padding: 14px 20px;
  font-size: 20px;
  width: 220px;
  font-weight: bold;
}

.exclusive-section .sidebar {
  width: 40%;
  /*padding: 15px;*/
}

.exclusive-section .side-item {
  display: flex;
  margin-bottom: 15px;
  gap: 10px;
  justify-content: center;
  align-items: start;
}

.exclusive-section .side-item img {
  width: auto;
  height: auto;
  object-fit: cover;
  max-width: 172px;
}

.exclusive-section .side-item p {
  font-size: 16px;
  margin: 0;
  font-family: 'Titillium Web';
  font-weight: 600;
  width:100%;
}
section.exclusive-section .featured {
    padding: 0;
    background: #fff;
}
.orgsec-container {
  display: flex;
  text-align: center;
  padding: 40px 0;
  background-image: url({{ asset('assets/images/images/tab-bg.png') }});
}

.orgsec-title,
.orgsec-subtitle {
  font-size: 2rem;
  font-weight: 700;
  margin-bottom: 30px;
  text-transform: capitalize;
  padding-top: 60px;
}
.orgsec-icons img {width: auto;}
.orgsec-card-wrapper {
  display: flex;
  justify-content: center;
  gap: 25px;
  margin-bottom: 50px;
  margin: 0 auto;
}

.orgsec-card {
  width: 230px;
  background: #fff;
  padding: 25px;
  border-radius: 15px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.08);
  text-align: left;
  transition: all 0.5s ease;
  transform: translateY(0);
}
.orgsec-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
}
.orgsec-icon {
  /* width: 50px; */
  margin-bottom: 12px;
  height: 100px;
}

.orgsec-card-title {
  margin: 0 0 10px;
  font-weight: bold;
  font-size: 32px;
}

.orgsec-desc {
  font-size: 16px;
  line-height: 24px;
  color: #363636;
}

.orgsec-tabs {
  display: flex;
  justify-content: center;
  border-radius: 50px;
  overflow: hidden;
  margin-bottom: 30px;
  width: 100%;
  max-width: 80%;
  margin: 0 auto;
}

.orgsec-tab {
  padding: 15px 30px;
  font-size: 13px;
  font-weight: bold;
  color: #fff;
  white-space: nowrap;
  width: 25%;
}

.orgsec-blue { background: #005da8; }
.orgsec-red { background: #d92526; }
.orgsec-active { background: #012b6d; }

.orgsec-icons {
  display: flex;
  justify-content: space-around;
  gap: 60px;
  width: 100%;
  max-width: 80%;
  margin: 0 auto;
}

.gallerysec-container {
  text-align: center;
  padding: 10px 0;
}

.gallerysec-title {
  font-size: 30px;
  margin-bottom: 8px;
  font-weight: bold;
}

.gallerysec-subtitle {
  font-size: 14px;
  margin-bottom: 30px;
  font-weight: bold;
  color: #1B263B;
}

.gallerysec-tabs {
  margin-bottom: 35px;
}

.gallerysec-tab {
  border: none;
  background: transparent;
  font-size: 12px;
  margin: 0 12px;
  padding-bottom: 5px;
  cursor: pointer;
  opacity: .7;
  text-transform: uppercase;
  letter-spacing: .5px;
  color: #6E6E6E;
}

.gallerysec-active {
  opacity: 1;
  border-bottom: 2px solid #000;
  color: #415A77;
}

.gallerysec-content {
  display: none;
}
.gallerysec-content.gallerysec-show {
  display: block;
}

.ytabs-container {
  width: 100%;
}

.ytabs-tabs {
  display: flex;
  gap: 35px;
  margin-bottom: 25px;
}

.ytabs-tab {
  font-size: 18px;
  opacity: 0.5;
  cursor: pointer;
  border-bottom: 2px solid transparent;
}

.ytabs-active {
  opacity: 1 !important;
  border-color: #d91d29;
}

.ytabs-slider {
  position: relative;
  width: 100%;
  overflow: hidden;
  display: none;
}

.ytabs-show {
  display: block;
}

.ytabs-track {
  display: flex;
  gap: 15px;
  transition: transform 0.4s ease;
}

.ytabs-track img {
  width: 280px;
  height: 170px;
  object-fit: cover;
  border-radius: 6px;
}

.ytabs-next {
  position: absolute;
  right: 0;
  top: 40%;
  background: #d91d29;
  color: #fff;
  width: 35px;
  height: 40px;
  border-radius: 4px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 24px;
  cursor: pointer;
  opacity: .8;
}


@media (max-width: 600px) {
  .ytabs-track img {
    width: 200px;
    height: 130px;
  }
  .ytabs-tabs {
    flex-wrap: wrap;
    gap: 15px;
  }
}

.footer {
  background: #b91c1c;
  border-radius: 20px;
  width: 80%;
  margin: 80px auto 0px;
  padding: 10px 60px;
  /* box-shadow: 0 0 60px rgba(0, 0, 0, 0.6); */
}

.footer-inner {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 50px;
}

.footer-left {
  flex: 1.2;
}

.footer-left h2 {
  font-size: 56px;
  font-weight: 700;
  line-height: 1.1;
  color: #fff;
}

.footer-left h2 span {
  color: #fff;
}

.footer-left p {
  margin: 25px 0 40px;
  font-size: 15px;
  color: #b5b5b5;
  max-width: 400px;
}

.subscribe-box {
  display: flex;
  margin-bottom: 30px;
}

.subscribe-box input {
  flex: 1;
  padding: 16px;
  border: none;
  outline: none;
  border-radius: 8px 0 0 8px;
  font-size: 15px;
  background: #f7f7f7;
  color: #333;
}

.subscribe-box button {
  background: #0073b1;
  color: #fff;
  border: none;
  padding: 0 30px;
  border-radius: 0 8px 8px 0;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
}

.subscribe-box button:hover {
  background: #0082ca;
}

.social-icons a {
  display: inline-block;
  color: #fff;
  font-size: 18px;
  margin-right: 15px;
  transition: color 0.3s;
}
.social-icons {
    display: flex;
}
.social-icons p {
  margin: 0;
}
.orgsec-icons > div {
    display: none;
}
section.events ::-webkit-scrollbar-button {
  display: none;
}
/* Scrollbar styling example */
section.events ::-webkit-scrollbar {
  width: 5px;
}

section.events ::-webkit-scrollbar-track {
  background: #f1f1f1;
}

section.events ::-webkit-scrollbar-thumb {
  background: #9a9a9a;
  border-radius: 5px;
}

/* Remove only arrows */
section.events ::-webkit-scrollbar-button {
  display: none;
}

/*New Style*/
.grid1 { grid-area: grid1; }
.grid2 { grid-area: grid2; }
.grid3 { grid-area: grid3; }
.grid4 { grid-area: grid4; }
.grid5 { grid-area: grid5; }
.grid6 { grid-area: grid6; }
    .grid-container{
        display:grid;
        grid-template-areas:
          'grid1 grid1 grid2 grid2 grid3 grid3 grid3 grid3'
          'grid4 grid4 grid4 grid5 grid5 grid6 grid6 grid6';
        gap:10px;
        
    }
.grid-container .grid-item {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 5px;
}
.events-wrap.container h2 {
  font-size: 32px;
  font-weight: 700;
  color: #222;
}
.events-wrap.container .featured h2{
    color:#fff;
}

@media screen and (max-width: 991px) {
      footer.footer {
        padding: 10px;
    }
    
    .contact-item {
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        gap: 0px;
        margin-bottom: 20px;
    }
    
    
    .orgsec-icons img {
        width: 150px;
        margin-inline: auto;
    }
    
    p.amaippai-quote-text {
        padding: 0;
        font-size: 24px;
    }
    
    p.amaippai-author {
        text-align: center;
        margin: 20px 0 0;
        font-size: 18px;
    }
    section {
        overflow: hidden;
    }
    .members-wrap h2 {
        font-size: 24px;
    }
    .container{
        padding: 0 3vw;
    }
    .events-wrap{
        flex-direction: column;
    }
    .column.left, .column.right{
        width: 100%;
        max-height: max-content;
    }
    .column.center{
        width: 100%;
    }
    .amaippai-wrapper{
        padding: 20px 3vw;
    }
    .amaippai-quote-block{
        margin: 0;
    }
    .members-top-row {
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }
    .s-member-wrap{
        width: 100%;
    }
    .members-bottom-row{
        flex-direction: column;
    }
    .exclusive-section .container{
        flex-direction: column;
    }
    .exclusive-section .featured,.exclusive-section .sidebar{
        width: 100%;
    }
    .orgsec-card-wrapper{
        flex-direction: column;
        align-items: center;
    }
    .orgsec-tabs {
        flex-direction: column;
        align-items: center;
    }
    .orgsec-tab {
        width: 100%;
    }
    .orgsec-icons {
        flex-direction: column;
        gap: 0;
    }
    .gallerysec-tab {
        display: block;
        margin: auto;
    }
    .grid-item {
      width: 100%;
    }
    .gallerysec-container{
      padding: 0px ;
    }
    .ytabs-tab {
      width: max-content;
    }
    .footer-left h2{
      font-size: 32px;
    }
    .footer-column{
      flex-direction: column;
    }
    .footer-contact {
      flex-direction: column;
      gap: 20px;
      align-items: start;
    }
    .footer-left {
        flex: 1 1 100%; /* let it take full width */
        width: 100%;    /* ensure 100% width */
      }
      .subscribe-box input {
      width: 70%;
    }
    .subscribe-box button {
      width: 30%;
      font-size: 14px;
      padding: 8px;
      flex: 1;
    }
    .footer-inner{
      gap: 0;
    
    }
    .orgsec-icons > div {
        display: block;
    }
    .orgsec-tabs {
        display: none;
    }
    .grid-container {
      display: flex;
      flex-direction: column;
    }
}

.slick-list {
    overflow: visible;
    -webkit-clip-path: inset(-100vw -100vw -100vw 0);
    clip-path: inset(-100vw -100vw -100vw 0);
}
.scroll-reveal.revealed.left-content{
    background-color:#D9D9D9;
    padding:50px 48px;
    border-radius:10px;
    margin-bottom:20px;
}
.scroll-reveal.revealed.right-img img{
    bottom:-40px;
}
</style>

    {{-- Full-Page Hero Slider --}}
    <section id="home" class="relative h-screen overflow-hidden">
        {{-- Slider Container --}}
        <div id="slider-container" class="absolute inset-0 flex transition-transform duration-700 ease-in-out">
            {{-- Slide 1 --}}
            <div class="w-full h-full flex-shrink-0 relative">
                <picture>
                    <source media="(max-width: 768px)" srcset="{{ asset('assets/images/bg/slider1.mobile.jpg') }}">
                    <img src="{{ asset('assets/images/bg/slider1.jpg') }}" class="w-full h-full object-cover" alt="Slide 1" loading="eager" fetchpriority="high">
                </picture>
                {{-- Optional: Overlay for better text readability if needed --}}
                <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black/40"></div>
            </div>

            {{-- Slide 2 --}}
            <div class="w-full h-full flex-shrink-0 relative">
                <picture>
                    <source media="(max-width: 768px)" srcset="{{ asset('assets/images/bg/slider2.mobile.jpg') }}">
                    <img src="{{ asset('assets/images/bg/slider2.jpg') }}" class="w-full h-full object-cover" alt="Slide 2" loading="lazy">
                </picture>
                {{-- Optional: Overlay for better text readability if needed --}}
                <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black/40"></div>
            </div>

            {{-- Slide 3 --}}
            <div class="w-full h-full flex-shrink-0 relative">
                <picture>
                    <source media="(max-width: 768px)" srcset="{{ asset('assets/images/bg/slider3.mobile.jpg') }}">
                    <img src="{{ asset('assets/images/bg/slider3.jpg') }}" class="w-full h-full object-cover" alt="Slide 3" loading="lazy">
                </picture>
                {{-- Optional: Overlay for better text readability if needed --}}
                <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black/40"></div>
            </div>
        </div>

        {{-- Navigation Dots --}}
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-3 z-10">
            <button class="w-3 h-3 rounded-full bg-white/70 hover:bg-white transition-all duration-300 hover:scale-125 shadow-lg" data-slide="0" aria-label="Go to slide 1"></button>
            <button class="w-3 h-3 rounded-full bg-white/70 hover:bg-white transition-all duration-300 hover:scale-125 shadow-lg" data-slide="1" aria-label="Go to slide 2"></button>
            <button class="w-3 h-3 rounded-full bg-white/70 hover:bg-white transition-all duration-300 hover:scale-125 shadow-lg" data-slide="2" aria-label="Go to slide 3"></button>
        </div>

        {{-- Scroll Indicator --}}
        <div class="absolute bottom-20 left-1/2 transform -translate-x-1/2 z-10 animate-bounce">
            <svg class="w-6 h-6 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    {{-- About Section - Apple Style --}}
    <section id="about" class="relative min-h-screen flex items-center justify-center px-4 bg-white dark:bg-gray-950 overflow-hidden">
        {{-- Background Image with Overlay --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/images/images/second.jpg') }}" alt="Background" class="w-full h-full object-cover opacity-90 dark:opacity-90" loading="lazy">
            <div class="absolute inset-0"></div>
        </div>

        <div class="max-w-7xl mx-auto w-full relative z-10 pt-16">
            {{-- Section Header --}}
            

            {{-- Content Grid --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                {{-- Text Content --}}
                <div class="order-2 lg:order-1 scroll-reveal left-content">
                    <div class="prose prose-lg max-w-none">
                        <h2 class="amaippai-title animation-element slide-top">{{ __('site.about.title') }}</h2>
                        <p class="text-lg md:text-xl  mb-6 leading-relaxed">
                            {{ __('site.about.intro-1') }}
                        </p>
                        <p class="text-lg md:text-xl leading-relaxed">
                            {{ __('site.about.intro-2') }}
                        </p>
                    </div>
                </div>

                {{-- Image Content --}}
                <div class="order-1 lg:order-2 scroll-reveal right-img animation-element slide-right">
                    <div class="relative">
                        {{-- Animated gradient glow --}}
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-red-500 to-blue-500 rounded-3xl opacity-0 group-hover:opacity-100 blur-2xl"></div>
                        <div class="absolute -inset-4 bg-gradient-to-r from-red-600 to-blue-600 rounded-3xl blur-2xl opacity-20 animate-pulse"></div>

                        {{-- Image with border --}}
                        <!-- <div class="relative">
                            <img src="{{ asset('assets/images/about/about-1.png') }}" alt="About Our Party" class="relative w-full h-auto rounded-2xl" loading="lazy">
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="events">
        <div class=" events-wrap container">
            <!-- Left Column -->
            <div class="column left">
                <h2>{{ __('site.latest_events') }}</h2>
                @forelse($latestEvents as $event)
                @php
                    $locale = app()->getLocale();
                    // Choose language-specific title/content with sensible fallback
                    $title = $locale === 'ta'
                        ? ($event->title_ta ?? $event->title_en)
                        : ($event->title_en ?? $event->title_ta);
                    $content = $locale === 'ta'
                        ? ($event->content_ta ?? $event->content_en)
                        : ($event->content_en ?? $event->content_ta);
                    // category name (no Tamil field assumed) - fallback to 'Event'
                    $categoryName = $event->category->name ?? 'Event';
                @endphp
                <div class="card">
                    <div class="meta">
                        <span class="tag tech {{ strtolower(str_replace(' ', '-', $categoryName ?? 'general')) }}">
                            {{ $categoryName ?? __('site.home.events') }}
                        </span>
                        <span class="date">{{ $event->event_date ? $event->event_date->format('F d, Y') : now()->format('F d, Y') }}</span>
                    </div>
                    <h3><a href="{{ route('media.show', $event->slug) }}">{{ $title }}</a></h3>
                    <p>{{ Str::limit(strip_tags($content ?? ''), 150) }}</p>
                </div>
                @empty
                <div class="card">
                    <p>{{ __('site.events.no_events') }}</p>
                </div>
                @endforelse
                <div class="text-center mt-4">
                    <a href="{{ route('events') }}" class="card-link" style="display: inline-block; padding: 12px 24px; background-color: #2563eb; color: white; border-radius: 8px; text-decoration: none; font-weight: 500; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#1d4ed8'" onmouseout="this.style.backgroundColor='#2563eb'">
                        {{ __('site.view_all_news') }}
                    </a>
                </div>
            </div>

            <!-- Center Column (Featured latest news: show single latest post) -->
            <div class="column center">
                @php
                    $featured = isset($latest_news) && $latest_news->count() ? $latest_news->first() : null;
                @endphp

                @if($featured)
                    @php
                        $locale = app()->getLocale();
                        $fTitle = $locale === 'ta' ? ($featured->title_ta ?? $featured->title_en) : ($featured->title_en ?? $featured->title_ta);
                        $fContent = $locale === 'ta' ? ($featured->content_ta ?? $featured->content_en) : ($featured->content_en ?? $featured->content_ta);
                        $fCategory = $featured->category->name ?? 'News';
                        $featuredImageUrl = $featured->featured_image_url ?? null;
                        // Prepare inline background style when an image is available
                        $featuredBgStyle = $featuredImageUrl ? "background-image: url('{$featuredImageUrl}'); background-size: cover; background-position: center; background-repeat: no-repeat;" : '';
                    @endphp

                    <div class="featured" style="{{ $featuredBgStyle }}">
                        <div class="featured-overlay">
                            <div class="featured-content">
                                <div class="meta">
                                    <span class="tag {{ strtolower(str_replace(' ', '-', $fCategory)) }}">{{ $fCategory }}</span>
                                    <span class="date">{{ $featured->event_date ? $featured->event_date->format('F d, Y') : now()->format('F d, Y') }}</span>
                                </div>
                                <h2 style="font-size: 1.3rem;"><a href="{{ route('media.show', $featured->slug) }}">{{ $fTitle }}</a></h2>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="featured">
                        <div class="featured-overlay">
                            <div class="featured-content">
                                <div class="meta">
                                    <span class="tag health">Health</span>
                                    <span class="date">{{ now()->format('F d, Y') }}</span>
                                </div>
                                <h2>Study Finds Link Between Social Media Use and Mental Health Issues</h2>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Right Column -->
            <div class="column right">
                <h2>{{ __('site.party_news') }}</h2>

                @if(isset($partyNews) && $partyNews->count())
                    @foreach($partyNews as $p)
                        @php
                            $locale = app()->getLocale();
                            $pTitle = $locale === 'ta' ? ($p->title_ta ?? $p->title_en) : ($p->title_en ?? $p->title_ta);
                            $pContent = $locale === 'ta' ? ($p->content_ta ?? $p->content_en) : ($p->content_en ?? $p->content_ta);
                            $pCategory = $p->category->name ?? 'Party News';
                        @endphp

                        <div class="card">
                            <div class="meta">
                                <span class="tag tech {{ strtolower(str_replace(' ', '-', $pCategory)) }}">{{ $pCategory }}</span>
                                <span class="date">{{ $p->event_date ? $p->event_date->format('F d, Y') : now()->format('F d, Y') }}</span>
                            </div>
                            <h3><a href="{{ route('media.show', $p->slug) }}">{{ $pTitle }}</a></h3>
                            <p>{{ Str::limit(strip_tags($pContent ?? ''), 120) }}</p>
                        </div>
                    @endforeach
                @else
                    <div class="card">
                        <p>{{ __('site.no_party_news') }}</p>
                    </div>
                @endif
                <div class="text-center mt-4">
                    <a href="{{ route('latest-news') }}" class="card-link" style="display: inline-block; padding: 12px 24px; background-color: #2563eb; color: white; border-radius: 8px; text-decoration: none; font-weight: 500; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#1d4ed8'" onmouseout="this.style.backgroundColor='#2563eb'">
                        {{ __('site.view_all_news') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="amaippai-wrapper">
        <div class="container">
            @if($quotes && $quotes->count() > 0)
            <div class="amaippai-quote-area">
                <div class="amaippai-quote-left">
                    <!-- <h2 class="amaippai-title animation-element slide-top">{{ __('site.amaippai_thiralvom.title') }}</h2> -->

                    <div class="amaippai-quote-block" id="mainQuoteBlock">
                        <img src="{{ asset('assets/images/images/quote-icon.png') }}" alt="quote-icon" loading="lazy" width="50" height="50">
                        <p class="amaippai-quote-text" id="mainQuoteText">
                            {{ app()->getLocale() === 'ta' ? $quotes->first()->title_ta : $quotes->first()->title_en }}
                        </p>
                    </div>

                    <p class="amaippai-author" id="mainQuoteAuthor">
                        {{ app()->getLocale() === 'ta' ? $quotes->first()->content_ta : $quotes->first()->content_en }}
                    </p>
                </div>

                <div class="amaippai-quote-right animation-element slide-right">
                    <div class="amaippai-book-wrapper">
                        <img src="{{ asset('assets/images/images/amaippai-thiralvom-right-img.png')}}" alt="Amaippai Thiralvom poster"
                            class="amaippai-image" loading="lazy" />
                        <div class="amaippai-img-overlay">
                            <a href="{{ route('books') }}" class="amaippai-buy-btn">{{ __('site.books.buy_book') }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="amaippai-news-row">
                @foreach($quotes->take(4) as $index => $quote)
                <div class="amaippai-news-card quote-card"
                     data-quote-text="{{ app()->getLocale() === 'ta' ? $quote->title_ta : $quote->title_en }}"
                     data-quote-author="{{ app()->getLocale() === 'ta' ? $quote->content_ta : $quote->content_en }}"
                     style="cursor: pointer;">
                    <img src="{{ asset('assets/images/images/star.png') }}" alt="Quote icon" class="amaippai-news-img" loading="lazy" />
                    <div class="amaippai-news-meta">
                        <h3 class="amaippai-news-title">{{ app()->getLocale() === 'ta' ? $quote->title_ta : $quote->title_en }}</h3>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            {{-- Fallback to static content if no quotes available --}}
            <div class="amaippai-quote-area">
                <div class="amaippai-quote-left">
                    <h2 class="amaippai-title animation-element slide-top">{{ __('site.amaippai_thiralvom.title') }}</h2>

                    <div class="amaippai-quote-block">
                        <img src="{{ asset('assets/images/images/quote-icon.png') }}" alt="quote-icon" loading="lazy" width="50" height="50">
                        <p class="amaippai-quote-text">
                            {{ __('site.amaippai_thiralvom.quote') }}
                        </p>
                    </div>

                    <p class="amaippai-author">{{ __('site.amaippai_thiralvom.author') }}</p>
                </div>

                <div class="amaippai-quote-right animation-element slide-right">
                    <div class="amaippai-book-wrapper">
                        <img src="{{ asset('assets/images/images/amaippai-thiralvom-right-img.png')}}" alt="Amaippai Thiralvom poster"
                            class="amaippai-image" loading="lazy" />
                        <div class="amaippai-img-overlay">
                            <a href="{{ route('books') }}" class="amaippai-buy-btn">{{ __('site.books.buy_book') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
    <!-- Video modal for YouTube playback -->
    <style>
        #video-modal { display: none; position: fixed; inset: 0; z-index: 9999; align-items: center; justify-content: center; }
        #video-modal.open { display: flex; }
        #video-modal .backdrop { position: absolute; inset: 0; background: rgba(0,0,0,0.8); }
        #video-modal .panel { position: relative; width: 90%; max-width: 1100px; z-index: 2; }
        #video-modal .panel .frame-wrap { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; }
        #video-modal iframe { position: absolute; top:0; left:0; width:100%; height:100%; border:0; }
        #video-modal .close-btn { position: absolute; right: -10px; top: -10px; background: #fff; border-radius: 999px; width:36px; height:36px; display:flex; align-items:center; justify-content:center; cursor:pointer; z-index:3; }
        .ytabs-track a[data-video] img { cursor: pointer; }
    </style>

    <div id="video-modal" aria-hidden="true">
        <div class="backdrop" id="video-modal-backdrop"></div>
        <div class="panel">
            <div class="frame-wrap">
                <iframe id="video-iframe" src="" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>
            </div>
            <button id="close-video-modal" class="close-btn" aria-label="Close video">✕</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('video-modal');
            const iframe = document.getElementById('video-iframe');
            const closeBtn = document.getElementById('close-video-modal');
            const backdrop = document.getElementById('video-modal-backdrop');

            function openVideo(url) {
                if (!url) return;
                // ensure autoplay param
                const sep = url.includes('?') ? '&' : '?';
                iframe.src = url + sep + 'autoplay=1';
                modal.classList.add('open');
                modal.setAttribute('aria-hidden', 'false');
            }

            function closeVideo() {
                iframe.src = '';
                modal.classList.remove('open');
                modal.setAttribute('aria-hidden', 'true');
            }

            // click handler for any element with data-video attribute inside the page
            document.body.addEventListener('click', function(e) {
                const el = e.target.closest('a[data-video]');
                if (!el) return;
                e.preventDefault();
                const url = el.getAttribute('data-video');
                if (url) openVideo(url);
            });

            closeBtn.addEventListener('click', closeVideo);
            backdrop.addEventListener('click', closeVideo);

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && modal.classList.contains('open')) {
                    closeVideo();
                }
            });
        });
    </script>
    
    <section class="members-section">
        <div class="container">
            <div class="members-wrap">
                <h2 class="animation-element slide-top">{{ __('site.home.members_section_title') }}</h2>
                <div class="members-wrap">
                    <div class="members-top-row">
                        <div class="s-member-wrap">
                            <div class="member-img">
                                <img src="{{ asset('assets/images/images/thol-thirmavalavan.png') }}" alt="{{ __('site.home.member_1_name') }}" loading="lazy">
                            </div>
                            <div class="member-cont">
                                <h6 class="animation-element slide-top">{{ __('site.home.member_1_name') }}</h6>
                                <span>{{ __('site.home.member_1_position') }}</span>
                                <div class="members-s-media">
                                    <p><a href="https://www.facebook.com/thirumaofficial" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/fb.png') }}" alt="facebook" loading="lazy"></a></p>
                                    <p><a href="https://x.com/thirumaofficial" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/twitter.png') }}" alt="twitter" loading="lazy"></a></p>
                                    <p><a href="https://www.instagram.com/thol.thirumaavalavan/" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/insta.png') }}" alt="instagram" loading="lazy"></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="s-member-wrap">
                            <div class="member-img">
                                <img src="{{ asset('assets/images/images/raj-kumar.png') }}" alt="{{ __('site.home.member_2_name') }}" loading="lazy">
                            </div>
                            <div class="member-cont">
                                <h6 class="animation-element slide-top">{{ __('site.home.member_2_name') }}</h6>
                                <span>{{ __('site.home.member_2_position') }}</span>
                                <div class="members-s-media">
                                    <p><a href="https://www.facebook.com/WriterRavikumar" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/fb.png') }}" alt="facebook" loading="lazy"></a></p>
                                    <p><a href="https://x.com/WriterRavikumar" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/twitter.png') }}" alt="twitter" loading="lazy"></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="members-bottom-row">
                        <div class="s-member-wrap">
                            <div class="member-img">
                                <img src="{{ asset('assets/images/images/sinthanai-selvan.png') }}" alt="{{ __('site.home.member_3_name') }}" loading="lazy">
                            </div>
                            <div class="member-cont">
                                <h6 class="animation-element slide-top">{{ __('site.home.member_3_name') }}</h6>
                                <span>{{ __('site.home.member_3_position') }}</span>
                                <div class="members-s-media">
                                    <p><a href="https://www.facebook.com/SinthanaiVCKofficial" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/fb.png') }}" alt="facebook" loading="lazy"></a></p>
                                    <p><a href="https://x.com/sinthanaivck" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/twitter.png') }}" alt="twitter" loading="lazy"></a></p>
                                    <p><a href="https://www.instagram.com/sinthanai_vck" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/insta.png') }}" alt="instagram" loading="lazy"></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="s-member-wrap">
                            <div class="member-img">
                                <img src="{{ asset('assets/images/images/aloor-shah-nawaz.png') }}" alt="{{ __('site.home.member_4_name') }}" loading="lazy">
                            </div>
                            <div class="member-cont">
                                <h6 class="animation-element slide-top">{{ __('site.home.member_4_name') }}</h6>
                                <span>{{ __('site.home.member_4_position') }}</span>
                                <div class="members-s-media">
                                    <p><a href="https://www.facebook.com/aloor.shanavas" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/fb.png') }}" alt="facebook" loading="lazy"></a></p>
                                    <p><a href="https://x.com/aloor_ShaNavas" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/twitter.png') }}" alt="twitter" loading="lazy"></a></p>
                                    <p><a href="https://www.instagram.com/aloor_sha_navas/" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/insta.png') }}" alt="instagram" loading="lazy"></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="s-member-wrap">
                            <div class="member-img">
                                <img src="{{ asset('assets/images/images/panaiyur-babu.png') }}" alt="{{ __('site.home.member_5_name') }}" loading="lazy">
                            </div>
                            <div class="member-cont">
                                <h6 class="animation-element slide-top">{{ __('site.home.member_5_name') }}</h6>
                                <span>{{ __('site.home.member_5_position') }}</span>
                                <div class="members-s-media">
                                    <p><a href="https://www.facebook.com/panaiyurmbabu/" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/fb.png') }}" alt="facebook" loading="lazy"></a></p>
                                    <p><a href="https://x.com/PanaiyurBabu" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/twitter.png') }}" alt="twitter" loading="lazy"></a></p>
                                    <p><a href="https://www.instagram.com/panaiyurbabumla/" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/insta.png') }}" alt="instagram" loading="lazy"></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="s-member-wrap">
                            <div class="member-img">
                                <img src="{{ asset('assets/images/images/balaji.png') }}" alt="{{ __('site.home.member_6_name') }}" loading="lazy">
                            </div>
                            <div class="member-cont">
                                <h6 class="animation-element slide-top">{{ __('site.home.member_6_name') }}</h6>
                                <span>{{ __('site.home.member_6_position') }}</span>
                                <div class="members-s-media">
                                    <p><a href="https://www.facebook.com/s.s.balaji" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/fb.png') }}" alt="facebook" loading="lazy"></a></p>
                                    <p><a href="https://x.com/VckBalaji" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/twitter.png') }}" alt="twitter" loading="lazy"></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section class="milestone-slider-section">
        <h2 class="milestone-slider-title animation-element slide-top">{{ __('site.history.milestones') }}</h2>

        <!-- Timeline navigation -->
        <div class="milestone-slider-years">
            <button class="milestone-slider-year active" data-slide="0">1972</button>
            <button class="milestone-slider-year" data-slide="1">1977</button>
            <button class="milestone-slider-year" data-slide="2">1980</button>
            <button class="milestone-slider-year" data-slide="3">1982</button>
            <button class="milestone-slider-year" data-slide="4">1989</button>
            <button class="milestone-slider-year" data-slide="5">1990</button>
            <button class="milestone-slider-year" data-slide="6">1992</button>
            <button class="milestone-slider-year" data-slide="7">1998</button>
            <button class="milestone-slider-year" data-slide="8">1999</button>
            <button class="milestone-slider-year" data-slide="9">2001</button>
            <button class="milestone-slider-year" data-slide="10">2004</button>
            <button class="milestone-slider-year" data-slide="11">2007</button>
            <button class="milestone-slider-year" data-slide="12">2009</button>
            <button class="milestone-slider-year" data-slide="13">2019</button>
            <button class="milestone-slider-year" data-slide="14">2021</button>
            <button class="milestone-slider-year" data-slide="15">2024</button>
        </div>

        <!-- Slider content -->
        <div class="milestone-slider-content">
            <div class="milestone-slider-item active">
                <img src="{{ asset('assets/images/images/1972.jpg') }}" alt="{{ __('site.history.1972_title') }}" class="milestone-slider-image" loading="lazy" />
                <h3 class="milestone-slider-caption">{{ __('site.history.1972_title') }}</h3>
                <p class="milestone-slider-text">
                    {{ __('site.history.1972_desc') }}
                </p>
            </div>

            <div class="milestone-slider-item">
                <img src="{{ asset('assets/images/images/1977.jpg') }}" alt="{{ __('site.history.1977_title') }}" class="milestone-slider-image" loading="lazy" />
                <h3 class="milestone-slider-caption">{{ __('site.history.1977_title') }}</h3>
                <p class="milestone-slider-text">
                    {{ __('site.history.1977_desc') }}
                </p>
            </div>

            <div class="milestone-slider-item">
                <img src="{{ asset('assets/images/images/1980.jpg') }}" alt="{{ __('site.history.1980_title') }}" class="milestone-slider-image" loading="lazy" />
                <h3 class="milestone-slider-caption">{{ __('site.history.1980s_title') }}</h3>
                <p class="milestone-slider-text">
                    {{ __('site.history.1980s_desc') }}
                </p>
            </div>

            <div class="milestone-slider-item">
                <img src="{{ asset('assets/images/images/1982.jpg') }}" alt="{{ __('site.history.1982_title') }}" class="milestone-slider-image" loading="lazy" />
                <h3 class="milestone-slider-caption">{{ __('site.history.1982_title') }}</h3>
                <p class="milestone-slider-text">
                    {{ __('site.history.1982_desc') }}
                </p>
            </div>

            <div class="milestone-slider-item">
                <img src="{{ asset('assets/images/images/1989.jpeg') }}" alt="{{ __('site.history.1989_title') }}" class="milestone-slider-image" loading="lazy" />
                <h3 class="milestone-slider-caption">{{ __('site.history.1989_title') }}</h3>
                <p class="milestone-slider-text">
                    {{ __('site.history.1989_desc') }}
                </p>
            </div>

            <div class="milestone-slider-item">
                <img src="{{ asset('assets/images/images/milestone-img1.png') }}" alt="{{ __('site.history.1990_title') }}" class="milestone-slider-image" loading="lazy" />
                <h3 class="milestone-slider-caption">{{ __('site.history.1990_title') }}</h3>
                <p class="milestone-slider-text">
                    {{ __('site.history.1990_desc') }}
                </p>
            </div>

            <div class="milestone-slider-item">
                <img src="{{ asset('assets/images/images/milestone-img1.png') }}" alt="{{ __('site.history.1992_title') }}" class="milestone-slider-image" loading="lazy" />
                <h3 class="milestone-slider-caption">{{ __('site.history.1992_1996_title') }}</h3>
                <p class="milestone-slider-text">
                    {{ __('site.history.1992_1996_desc') }}
                </p>
            </div>

            <div class="milestone-slider-item">
                <img src="{{ asset('assets/images/images/milestone-img1.png') }}" alt="{{ __('site.history.1998_title') }}" class="milestone-slider-image" loading="lazy" />
                <h3 class="milestone-slider-caption">{{ __('site.history.1998_title') }}</h3>
                <p class="milestone-slider-text">
                    {{ __('site.history.1998_desc') }}
                </p>
            </div>

            <div class="milestone-slider-item">
                <img src="{{ asset('assets/images/images/milestone-img1.png') }}" alt="{{ __('site.history.1999_title') }}" class="milestone-slider-image" loading="lazy" />
                <h3 class="milestone-slider-caption">{{ __('site.history.1999_title') }}</h3>
                <p class="milestone-slider-text">
                    {{ __('site.history.1999_desc') }}
                </p>
            </div>

            <div class="milestone-slider-item">
                <img src="{{ asset('assets/images/images/milestone-img1.png') }}" alt="{{ __('site.history.2001_title') }}" class="milestone-slider-image" loading="lazy" />
                <h3 class="milestone-slider-caption">{{ __('site.history.2001_title') }}</h3>
                <p class="milestone-slider-text">
                    {{ __('site.history.2001_desc') }}
                </p>
            </div>

            <div class="milestone-slider-item">
                <img src="{{ asset('assets/images/images/milestone-img1.png') }}" alt="{{ __('site.history.2004_title') }}" class="milestone-slider-image" loading="lazy" />
                <h3 class="milestone-slider-caption">{{ __('site.history.2004_title') }}</h3>
                <p class="milestone-slider-text">
                    {{ __('site.history.2004_desc') }}
                </p>
            </div>

            <div class="milestone-slider-item">
                <img src="{{ asset('assets/images/images/milestone-img1.png') }}" alt="{{ __('site.history.2007_title') }}" class="milestone-slider-image" loading="lazy" />
                <h3 class="milestone-slider-caption">{{ __('site.history.2007_title') }}</h3>
                <p class="milestone-slider-text">
                    {{ __('site.history.2007_desc') }}
                </p>
            </div>

            <div class="milestone-slider-item">
                <img src="{{ asset('assets/images/images/milestone-img1.png') }}" alt="{{ __('site.history.2009_title') }}" class="milestone-slider-image" loading="lazy" />
                <h3 class="milestone-slider-caption">{{ __('site.history.2009_title') }}</h3>
                <p class="milestone-slider-text">
                    {{ __('site.history.2009_desc') }}
                </p>
            </div>

            <div class="milestone-slider-item">
                <img src="{{ asset('assets/images/images/milestone-img1.png') }}" alt="{{ __('site.history.2019_title') }}" class="milestone-slider-image" loading="lazy" />
                <h3 class="milestone-slider-caption">{{ __('site.history.2019_title') }}</h3>
                <p class="milestone-slider-text">
                    {{ __('site.history.2019_desc') }}
                </p>
            </div>

            <div class="milestone-slider-item">
                <img src="{{ asset('assets/images/images/milestone-img1.png') }}" alt="{{ __('site.history.2021_title') }}" class="milestone-slider-image" loading="lazy" />
                <h3 class="milestone-slider-caption">{{ __('site.history.2021_title') }}</h3>
                <p class="milestone-slider-text">
                    {{ __('site.history.2021_desc') }}
                </p>
            </div>

            <div class="milestone-slider-item">
                <img src="{{ asset('assets/images/images/milestone-img1.png') }}" alt="{{ __('site.history.2024_title') }}" class="milestone-slider-image" loading="lazy" />
                <h3 class="milestone-slider-caption">{{ __('site.history.2024_title') }}</h3>
                <p class="milestone-slider-text">
                    {{ __('site.history.2024_desc') }}
                </p>
            </div>

        </div>
    </section>
    <section class="exclusive-section">
        <div class="container">
          @php
            $locale = app()->getLocale();
            $exclusiveInterviews = isset($exclusiveInterviews) ? $exclusiveInterviews : collect();
            
            // Function to convert any YouTube URL format to embed URL with proper configuration
            $convertToEmbedUrl = function($url) {
                if (empty($url)) return null;
                
                // Use Media model trait method for proper URL generation
                $media = new \App\Models\Media();
                return $media->getYouTubeEmbedUrl($url);
            };
            
            // Function to get YouTube thumbnail from video link
            $getThumbnailUrl = function($url) {
                if (empty($url)) return null;
                
                $videoId = null;
                if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]{11})/', $url, $matches)) {
                    $videoId = $matches[1];
                } elseif (preg_match('/^[a-zA-Z0-9_-]{11}$/', $url)) {
                    $videoId = $url;
                }
                
                return $videoId ? "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg" : null;
            };
            
            $featuredInterview = $exclusiveInterviews->first();
            $sidebarInterviews = $exclusiveInterviews->skip(1)->take(4);
          @endphp
          
          @if($featuredInterview && $featuredInterview->video_link)
            @php
              $embedUrl = $convertToEmbedUrl($featuredInterview->video_link);
              $featuredTitle = $locale === 'ta' ? ($featuredInterview->title_ta ?? $featuredInterview->title_en) : ($featuredInterview->title_en ?? $featuredInterview->title_ta);
            @endphp
            <!-- LEFT FEATURED VIDEO -->
            <div class="featured">
              @if($embedUrl)
                <iframe id="mainVideo" width="100%" height="580"
                  src="{!! $embedUrl !!}"
                  title="{{ $featuredTitle }}" frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  referrerpolicy="strict-origin-when-cross-origin"
                  allowfullscreen
                  loading="lazy"></iframe>
              @else
                <div style="width: 100%; height: 580px; background: #000; display: flex; align-items: center; justify-content: center; color: white;">
                  <p>Video not available</p>
                </div>
              @endif
              <div class="tag">{{ __('site.menu.interviews') }}</div>
            </div>
          @else
            <!-- PLACEHOLDER IF NO INTERVIEWS -->
            <div class="featured">
              <div style="width: 100%; height: 580px; background: #000; display: flex; align-items: center; justify-content: center; color: white;">
                <p>{{ __('site.videos.no_videos') }}</p>
              </div>
              <div class="tag">{{ __('site.menu.interviews') }}</div>
            </div>
          @endif
        
          <!-- RIGHT SIDEBAR -->
          <div class="sidebar">
            @forelse($sidebarInterviews as $interview)
              @if($interview->video_link)
                @php
                  $embedUrl = $convertToEmbedUrl($interview->video_link);
                  $title = $locale === 'ta' ? ($interview->title_ta ?? $interview->title_en) : ($interview->title_en ?? $interview->title_ta);
                  $thumbnailUrl = $getThumbnailUrl($interview->video_link);
                @endphp
                @if($embedUrl && $thumbnailUrl)
                  <div class="side-item" data-video="{!! $embedUrl !!}">
                    <img src="{{ $thumbnailUrl }}" alt="{{ $title }}" loading="lazy">
                    <p>{{ $title }}</p>
                  </div>
                @endif
              @endif
            @empty
              <div class="side-item">
                <p>{{ __('site.videos.no_videos') }}</p>
              </div>
            @endforelse
          </div>
        </div>
    </section>
    <section class="orgsec-container">
        <div class="container">
            <h2 class="orgsec-title">{{ __('site.color_symbolism.title') }}</h2>

            <div class="orgsec-card-wrapper">

            <div class="orgsec-card">
                <img src="{{ asset('assets/images/images/blue.png') }}" class="orgsec-icon" alt="{{ __('site.color_symbolism.blue_title') }}" loading="lazy">
                <h3 class="orgsec-card-title animation-element slide-top">{{ __('site.color_symbolism.blue_title') }}</h3>
                <p class="orgsec-desc">{{ __('site.color_symbolism.blue_meaning') }} - {{ __('site.color_symbolism.blue_subtitle') }}</p>
            </div>

            <div class="orgsec-card">
                <img src="{{ asset('assets/images/images/red.png') }}" class="orgsec-icon" alt="{{ __('site.color_symbolism.red_title') }}" loading="lazy">
                <h3 class="orgsec-card-title animation-element slide-top">{{ __('site.color_symbolism.red_title') }}</h3>
                <p class="orgsec-desc">{{ __('site.color_symbolism.red_meaning') }} - {{ __('site.color_symbolism.red_subtitle') }}</p>
            </div>

            <div class="orgsec-card">
                <img src="{{ asset('assets/images/images/star.png') }}" class="orgsec-icon" alt="{{ __('site.color_symbolism.star_title') }}" loading="lazy">
                <h3 class="orgsec-card-title animation-element slide-top">{{ __('site.color_symbolism.star_title') }}</h3>
                <p class="orgsec-desc">{{ __('site.color_symbolism.star_meaning') }} - {{ __('site.color_symbolism.star_subtitle') }}</p>
            </div>

            <div class="orgsec-card">
                <img src="{{ asset('assets/images/images/tiger.png') }}" class="orgsec-icon" alt="{{ __('site.color_symbolism.panther_title') }}" loading="lazy">
                <h3 class="orgsec-card-title animation-element slide-top">{{ __('site.color_symbolism.panther_title') }}</h3>
                <p class="orgsec-desc">{{ __('site.color_symbolism.panther_meaning') }} - {{ __('site.color_symbolism.panther_subtitle') }}</p>
            </div>
        </div>

        <h2 class="orgsec-subtitle">{{ __('site.color_symbolism.organization_structure') }}</h2>

        <div class="orgsec-tabs">
            <div class="orgsec-tab orgsec-blue">{{ __('site.color_symbolism.leadership') }}</div>
            <div class="orgsec-tab orgsec-red">{{ __('site.color_symbolism.district_secretaries') }}</div>
            <div class="orgsec-tab orgsec-blue orgsec-active">{{ __('site.color_symbolism.committee_members') }}</div>
            <div class="orgsec-tab orgsec-red">{{ __('site.color_symbolism.party_wings') }}</div>
        </div>

            <div class="orgsec-icons">
            <div class="orgsec-tab orgsec-blue">{{ __('site.color_symbolism.leadership') }}</div>
            <a href="{{ route('leadership') }}">
                <img class="animation-element slide-bottom" src="{{ asset('assets/images/images/leadership.png') }}" alt="{{ __('site.color_symbolism.leadership') }}" loading="lazy">
            </a>
            <div class="orgsec-tab orgsec-red">{{ __('site.color_symbolism.district_secretaries') }}</div>
            <a href="{{ route('party-representatives') }}">
                <img class="animation-element slide-bottom" src="{{ asset('assets/images/images/secratary.png') }}" alt="{{ __('site.color_symbolism.district_secretaries') }}" loading="lazy">
            </a>
            <div class="orgsec-tab orgsec-blue orgsec-active">{{ __('site.color_symbolism.committee_members') }}</div>
            <a href="{{ route('office-bearers') }}">
                <img class="animation-element slide-bottom" src="{{ asset('assets/images/images/commitee-members.png') }}" alt="{{ __('site.color_symbolism.committee_members') }}" loading="lazy">
            </a>
            <div class="orgsec-tab orgsec-red">{{ __('site.color_symbolism.party_wings') }}</div>
            <a href="{{ route('party-wings') }}">
                <img class="animation-element slide-bottom" src="{{ asset('assets/images/images/party-wings.png') }}" alt="{{ __('site.color_symbolism.party_wings') }}" loading="lazy">
            </a>
        </div>
        </div>

    </section>
    <section class="gallerysec-container">

        <div class="container">
            <h2 class="gallerysec-title">{{ __('site.gallery.title') }}</h2>
            <p class="gallerysec-subtitle">{{ __('site.gallery.description') }}</p>

            <div class="gallerysec-tabs">
                <button class="gallerysec-tab gallerysec-active" data-target="events">{{ __('site.gallery.events_gallery') }}</button>
                <button class="gallerysec-tab" data-target="party">{{ __('site.gallery.vck_party') }}</button>
                <button class="gallerysec-tab" data-target="thiru">{{ __('site.gallery.thiruma_special') }}</button>
            </div>

            <!-- EVENTS TAB -->
            <div class="gallerysec-content gallerysec-show" id="events">
                <div class="grid-container">
                    <img class="grid-item grid1" src="{{ asset('assets/images/images/gallery-img1.png') }}" alt="gallery-img1" loading="lazy">
                    <img class="grid-item grid2" src="{{ asset('assets/images/images/gallery-img2.png') }}" alt="gallery-img2" loading="lazy">
                    <img class="grid-item grid3" src="{{ asset('assets/images/images/gallery-img3.png') }}" alt="gallery-img3" loading="lazy">
                    <img class="grid-item grid4" src="{{ asset('assets/images/images/gallery-img4.png') }}" alt="gallery-img4" loading="lazy">
                    <img class="grid-item grid5" src="{{ asset('assets/images/images/gallery-img5.png') }}" alt="gallery-img5" loading="lazy">
                    <img class="grid-item grid6" src="{{ asset('assets/images/images/gallery-img6.png') }}" alt="gallery-img6" loading="lazy">
                </div>
            </div>

             <!--PARTY TAB -->
            <div class="gallerysec-content gallerysec-show" id="party">
                <div class="grid-container">
                    <img class="grid-item grid2" src="{{ asset('assets/images/images/gallery-img1.png') }}" alt="gallery-img1" loading="lazy">
                    <img class="grid-item grid1" src="{{ asset('assets/images/images/gallery-img2.png') }}" alt="gallery-img2" loading="lazy">
                    <img class="grid-item grid3" src="{{ asset('assets/images/images/gallery-img3.png') }}" alt="gallery-img3" loading="lazy">
                    <img class="grid-item grid6" src="{{ asset('assets/images/images/gallery-img4.png') }}" alt="gallery-img4" loading="lazy">
                    <img class="grid-item grid5" src="{{ asset('assets/images/images/gallery-img5.png') }}" alt="gallery-img5" loading="lazy">
                    <img class="grid-item grid4" src="{{ asset('assets/images/images/gallery-img6.png') }}" alt="gallery-img6" loading="lazy">
                </div>
            </div>

             <!--THIRU TAB -->
            <div class="gallerysec-content gallerysec-show" id="thiru">
                <div class="grid-container">
                    <img class="grid-item grid6" src="{{ asset('assets/images/images/gallery-img1.png') }}" alt="gallery-img1" loading="lazy">
                    <img class="grid-item grid5" src="{{ asset('assets/images/images/gallery-img2.png') }}" alt="gallery-img2" loading="lazy">
                    <img class="grid-item grid4" src="{{ asset('assets/images/images/gallery-img3.png') }}" alt="gallery-img3" loading="lazy">
                    <img class="grid-item grid3" src="{{ asset('assets/images/images/gallery-img4.png') }}" alt="gallery-img4" loading="lazy">
                    <img class="grid-item grid2" src="{{ asset('assets/images/images/gallery-img5.png') }}" alt="gallery-img5" loading="lazy">
                    <img class="grid-item grid1" src="{{ asset('assets/images/images/gallery-img6.png') }}" alt="gallery-img6" loading="lazy">
                </div>
            </div>
        </div>

    </section>
    <section class="ytabs-container">

        <div class="container">
            @php
                $locale = app()->getLocale();
                $videoGallery = isset($videoGallery) ? $videoGallery : collect();
                $velichamTvGallery = isset($velichamTvGallery) ? $velichamTvGallery : collect();
                $kalathiGallery = isset($kalathiGallery) ? $kalathiGallery : collect();
                $pressMeetGallery = isset($pressMeetGallery) ? $pressMeetGallery : collect();
                
                // Use Media model trait method for proper YouTube embed URL generation
                $media = new \App\Models\Media();
                $getYouTubeEmbedUrl = function($url) use ($media) {
                    if (empty($url)) return null;
                    return $media->getYouTubeEmbedUrl($url);
                };
            @endphp
            <div class="ytabs-tabs">
                <div class="ytabs-tab ytabs-active" data-target="ytabs-yt">{{ __('site.videos.vck_youtube') }}</div>
                <div class="ytabs-tab" data-target="ytabs-vtv">{{ __('site.videos.velicham_tv') }}</div>
                <div class="ytabs-tab" data-target="ytabs-kal">{{ __('site.videos.kalaththil_chiruthaigal') }}</div>
                <div class="ytabs-tab" data-target="ytabs-press">{{ __('site.videos.thirumavalavan_press_meet') }}</div>
            </div>

            <!-- VCK YouTube Tab: Dynamic Video Gallery -->
            <div class="ytabs-slider ytabs-show" id="ytabs-yt">
                <div class="ytabs-track">
                    @forelse($videoGallery as $video)
                        @php
                            $title = $locale === 'ta' ? ($video->title_ta ?? $video->title_en) : ($video->title_en ?? $video->title_ta);
                            $embedUrl = $getYouTubeEmbedUrl($video->video_link ?? '');
                        @endphp
                        @if($embedUrl)
                            <iframe width="360" height="215" src="{!! $embedUrl !!}" title="{{ $title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen referrerpolicy="strict-origin-when-cross-origin" style="margin:8px 0;" loading="lazy"></iframe>
                        @else
                            <img src="{{ asset('assets/images/images/vck-yt1.png') }}" alt="{{ $title }}" style="object-fit: cover;" loading="lazy">
                        @endif
                    @empty
                        <img src="{{ asset('assets/images/images/vck-yt1.png') }}" alt="yt1">
                        <img src="{{ asset('assets/images/images/vck-yt2.png') }}" alt="yt2">
                        <img src="{{ asset('assets/images/images/vck-yt3.png') }}" alt="yt3">
                        <img src="{{ asset('assets/images/images/vck-yt4.png') }}" alt="yt4">
                        <img src="{{ asset('assets/images/images/vck-yt5.png') }}" alt="yt5">
                    @endforelse
                </div>
                <div class="ytabs-next">›</div>
            </div>

            <!-- Velicham TV Tab: Dynamic Video Gallery -->
            <div class="ytabs-slider" id="ytabs-vtv">
                <div class="ytabs-track">
                    @forelse($velichamTvGallery as $video)
                        @php
                            $title = $locale === 'ta' ? ($video->title_ta ?? $video->title_en) : ($video->title_en ?? $video->title_ta);
                            $embedUrl = $getYouTubeEmbedUrl($video->video_link ?? '');
                        @endphp
                        @if($embedUrl)
                            <iframe width="360" height="215" src="{!! $embedUrl !!}" title="{{ $title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen referrerpolicy="strict-origin-when-cross-origin" style="margin:8px 0;" loading="lazy"></iframe>
                        @else
                            <img src="{{ asset('assets/images/images/vck-yt1.png') }}" alt="{{ $title }}" style="object-fit: cover;" loading="lazy">
                        @endif
                    @empty
                        <img src="{{ asset('assets/images/images/vck-yt1.png') }}" alt="yt1">
                        <img src="{{ asset('assets/images/images/vck-yt2.png') }}" alt="yt2">
                        <img src="{{ asset('assets/images/images/vck-yt3.png') }}" alt="yt3">
                    @endforelse
                </div>
                <div class="ytabs-next">›</div>
            </div>

            <!-- Kalathi Chiruthaikal Tab: Dynamic Video Gallery -->
            <div class="ytabs-slider" id="ytabs-kal">
                <div class="ytabs-track">
                    @forelse($kalathiGallery as $video)
                        @php
                            $title = $locale === 'ta' ? ($video->title_ta ?? $video->title_en) : ($video->title_en ?? $video->title_ta);
                            $embedUrl = $getYouTubeEmbedUrl($video->video_link ?? '');
                        @endphp
                        @if($embedUrl)
                            <iframe width="360" height="215" src="{!! $embedUrl !!}" title="{{ $title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen referrerpolicy="strict-origin-when-cross-origin" style="margin:8px 0;" loading="lazy"></iframe>
                        @else
                            <img src="{{ asset('assets/images/images/vck-yt1.png') }}" alt="{{ $title }}" style="object-fit: cover;" loading="lazy">
                        @endif
                    @empty
                        <img src="{{ asset('assets/images/images/vck-yt1.png') }}" alt="yt1">
                        <img src="{{ asset('assets/images/images/vck-yt2.png') }}" alt="yt2">
                        <img src="{{ asset('assets/images/images/vck-yt3.png') }}" alt="yt3">
                    @endforelse
                </div>
                <div class="ytabs-next">›</div>
            </div>

            <!-- Thirumavalavan Press Meet Tab: Dynamic Video Gallery -->
            <div class="ytabs-slider" id="ytabs-press">
                <div class="ytabs-track">
                    @forelse($pressMeetGallery as $video)
                        @php
                            $title = $locale === 'ta' ? ($video->title_ta ?? $video->title_en) : ($video->title_en ?? $video->title_ta);
                            $embedUrl = $getYouTubeEmbedUrl($video->video_link ?? '');
                        @endphp
                        @if($embedUrl)
                            <iframe width="360" height="215" src="{!! $embedUrl !!}" title="{{ $title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen referrerpolicy="strict-origin-when-cross-origin" style="margin:8px 0;" loading="lazy"></iframe>
                        @else
                            <img src="{{ asset('assets/images/images/vck-yt1.png') }}" alt="{{ $title }}" style="object-fit: cover;" loading="lazy">
                        @endif
                    @empty
                        <img src="{{ asset('assets/images/images/vck-yt1.png') }}" alt="yt1">
                        <img src="{{ asset('assets/images/images/vck-yt2.png') }}" alt="yt2">
                        <img src="{{ asset('assets/images/images/vck-yt3.png') }}" alt="yt3">
                    @endforelse
                </div>
                <div class="ytabs-next">›</div>
            </div>
        </div>

    </section>
    

    {{-- Horizontal Scroll Script with Auto-Scroll --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Generic function to setup scroll for a section
            function setupScroll(containerId, leftBtnId, rightBtnId, progressBarId) {
                const container = document.getElementById(containerId);
                const leftBtn = document.getElementById(leftBtnId);
                const rightBtn = document.getElementById(rightBtnId);
                const progressBar = document.getElementById(progressBarId);

                if (!container || !leftBtn || !rightBtn || !progressBar) return;

                // Scroll amount (width of one card + gap)
                const scrollAmount = 336;
                let autoScrollInterval;
                let isUserInteracting = false;

                // Scroll buttons
                leftBtn.addEventListener('click', () => {
                    stopAutoScroll();
                    container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
                    setTimeout(startAutoScroll, 5000); // Resume after 5 seconds
                });

                rightBtn.addEventListener('click', () => {
                    stopAutoScroll();
                    container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                    setTimeout(startAutoScroll, 5000); // Resume after 5 seconds
                });

                // Update progress bar
                function updateProgress() {
                    const scrollWidth = container.scrollWidth - container.clientWidth;
                    const scrolled = container.scrollLeft;
                    const progress = (scrolled / scrollWidth) * 100;
                    progressBar.style.width = `${progress}%`;
                }

                container.addEventListener('scroll', updateProgress);
                updateProgress();

                // Auto-scroll functionality
                function autoScroll() {
                    if (isUserInteracting) return;

                    const scrollWidth = container.scrollWidth - container.clientWidth;
                    const currentScroll = container.scrollLeft;

                    // If reached the end, scroll back to start
                    if (currentScroll >= scrollWidth - 10) {
                        container.scrollTo({ left: 0, behavior: 'smooth' });
                    } else {
                        // Scroll to next card
                        container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                    }
                }

                function startAutoScroll() {
                    stopAutoScroll(); // Clear any existing interval
                    autoScrollInterval = setInterval(autoScroll, 3000); // Auto-scroll every 3 seconds
                }

                function stopAutoScroll() {
                    if (autoScrollInterval) {
                        clearInterval(autoScrollInterval);
                        autoScrollInterval = null;
                    }
                }

                // Pause auto-scroll on user interaction
                container.addEventListener('mouseenter', () => {
                    isUserInteracting = true;
                    stopAutoScroll();
                });

                container.addEventListener('mouseleave', () => {
                    isUserInteracting = false;
                    startAutoScroll();
                });

                container.addEventListener('touchstart', () => {
                    isUserInteracting = true;
                    stopAutoScroll();
                });

                container.addEventListener('touchend', () => {
                    setTimeout(() => {
                        isUserInteracting = false;
                        startAutoScroll();
                    }, 3000); // Resume after 3 seconds of no touch
                });

                // Pause auto-scroll when manually scrolling
                let scrollTimeout;
                container.addEventListener('scroll', () => {
                    if (!autoScrollInterval) {
                        clearTimeout(scrollTimeout);
                        scrollTimeout = setTimeout(() => {
                            if (!isUserInteracting) {
                                startAutoScroll();
                            }
                        }, 3000);
                    }
                });

                // Keyboard navigation
                container.addEventListener('keydown', (e) => {
                    if (e.key === 'ArrowLeft') {
                        e.preventDefault();
                        leftBtn.click();
                    } else if (e.key === 'ArrowRight') {
                        e.preventDefault();
                        rightBtn.click();
                    }
                });

                // Start auto-scroll on page load
                startAutoScroll();

                // Pause when page is not visible
                document.addEventListener('visibilitychange', () => {
                    if (document.hidden) {
                        stopAutoScroll();
                    } else if (!isUserInteracting) {
                        startAutoScroll();
                    }
                });
            }

            // Setup scroll for news, videos, and timeline
            setupScroll('news-scroll-container', 'news-scroll-left', 'news-scroll-right', 'news-scroll-progress');
            setupScroll('videos-scroll-container', 'videos-scroll-left', 'videos-scroll-right', 'videos-scroll-progress');
            setupScroll('timeline-scroll-container', 'timeline-scroll-left', 'timeline-scroll-right', 'timeline-scroll-progress');
        });
    </script>
    

    {{-- Hide Scrollbar Style --}}
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
    </style>

    {{-- Additional Animations Styles --}}
    <style>
        /* Hero Text Animations */
        @keyframes hero-slide-up {
            0% {
                opacity: 0;
                transform: translateY(80px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes hero-fade-in {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes hero-buttons-appear {
            0% {
                opacity: 0;
                transform: translateY(20px) scale(0.95);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .hero-text-slide-up {
            animation: hero-slide-up 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }

        .hero-text-fade-in {
            animation: hero-fade-in 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }

        .hero-buttons {
            animation: hero-buttons-appear 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }

        /* Other Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-30px); }
        }

        @keyframes float-delayed {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-40px); }
        }

        @keyframes pulse-slow {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.1); }
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        @keyframes fade-in-down {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-float {
            animation: float 8s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: float-delayed 10s ease-in-out infinite;
            animation-delay: 1s;
        }

        .animate-pulse-slow {
            animation: pulse-slow 6s ease-in-out infinite;
        }

        .animate-shimmer {
            animation: shimmer 3s ease-in-out infinite;
        }

        .animate-shimmer-delayed {
            animation: shimmer 3s ease-in-out infinite;
            animation-delay: 1.5s;
        }

        .animate-fade-in-down {
            animation: fade-in-down 0.8s ease-out forwards;
        }

        .parallax-quote-bg {
            will-change: transform;
        }
    </style>

    {{-- Quote Parallax Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quoteSection = document.getElementById('quote-banner');
            const parallaxBg = quoteSection?.querySelector('.parallax-quote-bg');

            if (parallaxBg) {
                window.addEventListener('scroll', () => {
                    const rect = quoteSection.getBoundingClientRect();
                    const scrolled = window.pageYOffset;

                    // Only apply parallax when section is in view
                    if (rect.top < window.innerHeight && rect.bottom > 0) {
                        const rate = (scrolled - quoteSection.offsetTop) * 0.3;
                        parallaxBg.style.transform = `translateY(${rate}px)`;
                    }
                });
            }
        });
    </script>

    {{-- Custom Styles for Animations --}}
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 1s ease-out forwards;
        }

        .scroll-reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .scroll-reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Apple-style backdrop blur */
        @supports (backdrop-filter: blur(20px)) or (-webkit-backdrop-filter: blur(20px)) {
            .backdrop-blur-apple {
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
            }
        }
    </style>

    {{-- Scripts --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hero Slider
            const sliderContainer = document.getElementById('slider-container');
            const slideButtons = document.querySelectorAll('[data-slide]');
            let currentSlide = 0;
            const totalSlides = 3;
            let autoSlideInterval;

            function goToSlide(slideIndex) {
                currentSlide = slideIndex;
                const offset = -slideIndex * 100;
                sliderContainer.style.transform = `translateX(${offset}%)`;

                // Update active dot
                slideButtons.forEach((btn, index) => {
                    if (index === slideIndex) {
                        btn.classList.remove('bg-white/70');
                        btn.classList.add('bg-white');
                    } else {
                        btn.classList.remove('bg-white');
                        btn.classList.add('bg-white/70');
                    }
                });
            }

            function nextSlide() {
                const next = (currentSlide + 1) % totalSlides;
                goToSlide(next);
            }

            function startAutoSlide() {
                autoSlideInterval = setInterval(nextSlide, 5000); // Auto-slide every 5 seconds
            }

            function stopAutoSlide() {
                if (autoSlideInterval) {
                    clearInterval(autoSlideInterval);
                }
            }

            // Navigation dots click handlers
            slideButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    stopAutoSlide();
                    const slideIndex = parseInt(button.getAttribute('data-slide'));
                    goToSlide(slideIndex);
                    startAutoSlide(); // Restart auto-slide
                });
            });

            // Pause auto-slide on hover
            if (sliderContainer) {
                sliderContainer.addEventListener('mouseenter', stopAutoSlide);
                sliderContainer.addEventListener('mouseleave', startAutoSlide);
            }

            // Initialize
            goToSlide(0);
            startAutoSlide();

            // Parallax Effect for Hero
            const parallaxBg = document.getElementById('parallax-bg');
            if (parallaxBg) {
                window.addEventListener('scroll', () => {
                    const scrolled = window.pageYOffset;
                    const rate = scrolled * 0.5;
                    parallaxBg.style.transform = `translate3d(0, ${rate}px, 0) scale(1.1)`;
                });
            }

            // Scroll Reveal Animation
            const revealElements = document.querySelectorAll('.scroll-reveal');
            const revealOnScroll = () => {
                revealElements.forEach(el => {
                    const elementTop = el.getBoundingClientRect().top;
                    const elementBottom = el.getBoundingClientRect().bottom;
                    const isVisible = (elementTop < window.innerHeight - 100) && (elementBottom > 0);

                    if (isVisible) {
                        el.classList.add('revealed');
                    }
                });
            };

            window.addEventListener('scroll', revealOnScroll);
            revealOnScroll(); // Initial check

            // Video Modal
            const thumbnails = document.querySelectorAll('.video-thumbnail');
            const modal = document.getElementById('video-modal');
            const iframe = document.getElementById('video-iframe');
            const closeModal = document.getElementById('close-modal');

            if (thumbnails.length > 0 && modal && iframe && closeModal) {
                thumbnails.forEach(thumbnail => {
                    thumbnail.addEventListener('click', function() {
                        const videoId = this.getAttribute('data-video-id');
                        if (videoId) {
                            // Build embed URL with all required parameters to prevent Error 153
                            // Use helper function if available, otherwise build manually
                            let origin = window.location.origin;
                            // Remove port if it's a standard port (YouTube doesn't need it)
                            try {
                                const url = new URL(origin);
                                if ((url.protocol === 'https:' && url.port === '443') || 
                                    (url.protocol === 'http:' && url.port === '80') ||
                                    !url.port) {
                                    origin = `${url.protocol}//${url.hostname}`;
                                }
                            } catch (e) {
                                // Fallback to original origin if URL parsing fails
                            }
                            const embedUrl = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&modestbranding=1&enablejsapi=1&origin=${encodeURIComponent(origin)}&widget_referrer=${encodeURIComponent(origin)}`;
                            iframe.src = embedUrl;
                            modal.classList.remove('hidden');
                            modal.classList.add('flex');
                        }
                    });
                });

                function closeVideoModal() {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    iframe.src = '';
                }

                closeModal.addEventListener('click', closeVideoModal);
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        closeVideoModal();
                    }
                });

                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                        closeVideoModal();
                    }
                });
            }

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    const href = this.getAttribute('href');
                    if (href !== '#' && href !== '#0') {
                        const target = document.querySelector(href);
                        if (target) {
                            e.preventDefault();
                            target.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    }
                });
            });
        });
    </script>
    {{-- Defer jQuery and lazy load YouTube iframes --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
    <script>
        // Load YouTube iframes only when visible or clicked
        document.addEventListener('DOMContentLoaded', function() {
            // Lazy load YouTube iframes
            function loadYouTubeIframes() {
                const iframes = document.querySelectorAll('iframe[data-src]');
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const iframe = entry.target;
                            if (iframe.dataset.src) {
                                iframe.src = iframe.dataset.src;
                                iframe.removeAttribute('data-src');
                            }
                            observer.unobserve(iframe);
                        }
                    });
                }, { rootMargin: '50px' });
                
                iframes.forEach(iframe => observer.observe(iframe));
            }
            
            // Load main video when section is visible
            const mainVideo = document.getElementById('mainVideo');
            if (mainVideo && mainVideo.dataset.src) {
                const videoObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting && mainVideo.dataset.src) {
                            mainVideo.src = mainVideo.dataset.src;
                            mainVideo.removeAttribute('data-src');
                            videoObserver.unobserve(mainVideo);
                        }
                    });
                }, { rootMargin: '200px' });
                videoObserver.observe(mainVideo);
            }
            
            // Load iframes in video gallery tabs when they become visible
            const videoTabs = document.querySelectorAll('.ytabs-tab');
            videoTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const targetId = this.dataset.target;
                    const targetSlider = document.getElementById(targetId);
                    if (targetSlider) {
                        setTimeout(() => {
                            const iframes = targetSlider.querySelectorAll('iframe[data-src]');
                            iframes.forEach(iframe => {
                                if (iframe.dataset.src) {
                                    iframe.src = iframe.dataset.src;
                                    iframe.removeAttribute('data-src');
                                }
                            });
                        }, 100);
                    }
                });
            });
            
            loadYouTubeIframes();
        });
        
        // Animation elements check - defer until jQuery loads
        window.addEventListener('load', function() {
            if (typeof jQuery !== 'undefined') {
                jQuery(document).ready(function () {
                  var $animationElements = jQuery(".animation-element");
                  var $window = jQuery(window);
                
                  function checkIfInView() {
                    var windowHeight = $window.height();
                    var windowTop = $window.scrollTop();
                    var windowBottom = windowTop + windowHeight;
                
                    jQuery.each($animationElements, function () {
                      var $element = jQuery(this);
                      var elementHeight = $element.outerHeight();
                      var elementTop = $element.offset().top;
                      var elementBottom = elementTop + elementHeight;
                
                      if (elementBottom >= windowTop && elementTop <= windowBottom) {
                        $element.addClass("in-view");
                      }
                    });
                  }
                
                  $window.on("scroll resize", checkIfInView);
                  $window.trigger("scroll");
                });
            }
        });
    </script>
    <script>
        // Historic Milestones JS
        const yearButtons = document.querySelectorAll(".milestone-slider-year");
        const slides = document.querySelectorAll(".milestone-slider-item");

        yearButtons.forEach((button, index) => {
            button.addEventListener("click", () => {
                // Remove active from all
                yearButtons.forEach(btn => btn.classList.remove("active"));
                slides.forEach(slide => slide.classList.remove("active"));

                // Activate current
                button.classList.add("active");
                slides[index].classList.add("active");
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
          const mainVideo = document.getElementById("mainVideo");
          const tag = document.querySelector(".featured .tag");
          const sideItems = document.querySelectorAll(".side-item");
        
          sideItems.forEach(item => {
            item.addEventListener("click", () => {
              // Get clicked video link & text
              const newVideo = item.getAttribute("data-video");
              const newText = item.querySelector("p").textContent;
        
              // Get current video src & text before swapping
              const oldVideo = mainVideo.src;
              const oldText = tag.textContent;
        
              // Swap: set clicked video to featured with autoplay
              mainVideo.src = `${newVideo}&autoplay=1`;
              tag.textContent = newText;
        
              // Replace clicked sidebar item with old video thumbnail + title
              const oldVideoId = oldVideo.split("/embed/")[1]?.split("?")[0];
              if (oldVideoId) {
                item.innerHTML = `
                  <img src="https://img.youtube.com/vi/${oldVideoId}/hqdefault.jpg" alt="">
                  <p>${oldText}</p>
                `;
                item.setAttribute("data-video", oldVideo);
              }
            });
          });
        });
    </script>
    <script>
        // Gallery JS
        document.addEventListener("DOMContentLoaded", () => {
          const tabs = document.querySelectorAll(".gallerysec-tab");
          const contents = document.querySelectorAll(".gallerysec-content");
        
          // Show only the active one on load
          contents.forEach(content => content.style.display = "none");
          document.querySelector(".gallerysec-content.gallerysec-show").style.display = "block";
        
          // Tab click handling
          tabs.forEach(tab => {
            tab.addEventListener("click", () => {
              tabs.forEach(t => t.classList.remove("gallerysec-active"));
              tab.classList.add("gallerysec-active");
        
              const target = tab.getAttribute("data-target");
              contents.forEach(content => {
                content.style.display = (content.id === target) ? "block" : "none";
              });
            });
          });
        });
    </script>
    <script>
        // Function to load iframes from data-src to src
        function loadIframesInElement(element) {
            const iframes = element.querySelectorAll('iframe[data-src]');
            iframes.forEach(iframe => {
                if (iframe.dataset.src) {
                    // Decode HTML entities in the URL (convert &amp; to &)
                    const src = iframe.dataset.src.replace(/&amp;/g, '&');
                    iframe.src = src;
                    iframe.removeAttribute('data-src');
                }
            });
        }

        // Load iframes for initially visible tab on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Find the initially visible slider
            const visibleSlider = document.querySelector('.ytabs-slider.ytabs-show');
            if (visibleSlider) {
                loadIframesInElement(visibleSlider);
            }
            
            // Also load all visible iframes using IntersectionObserver as fallback
            const allIframes = document.querySelectorAll('iframe[data-src]');
            if (allIframes.length > 0) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const iframe = entry.target;
                            if (iframe.dataset.src) {
                                const src = iframe.dataset.src.replace(/&amp;/g, '&');
                                iframe.src = src;
                                iframe.removeAttribute('data-src');
                                observer.unobserve(iframe);
                            }
                        }
                    });
                }, { rootMargin: '100px' });
                
                allIframes.forEach(iframe => observer.observe(iframe));
            }
        });

        const yTabs = document.querySelectorAll(".ytabs-tab");
        const ySliders = document.querySelectorAll(".ytabs-slider");

        // Tab switching
        yTabs.forEach(tab => {
            tab.addEventListener("click", () => {
                yTabs.forEach(t => t.classList.remove("ytabs-active"));
                tab.classList.add("ytabs-active");

                ySliders.forEach(s => s.classList.remove("ytabs-show"));
                const targetSlider = document.getElementById(tab.dataset.target);
                if (targetSlider) {
                    targetSlider.classList.add("ytabs-show");
                    // Load iframes immediately when tab becomes visible
                    loadIframesInElement(targetSlider);
                }
            });
        });

        // Slider scroll and lazy load iframes
        ySliders.forEach(slider => {
            const track = slider.querySelector(".ytabs-track");
            const btn = slider.querySelector(".ytabs-next");
            let x = 0;

            btn.addEventListener("click", () => {
                const maxScroll = track.scrollWidth - slider.clientWidth;
                x += 300;
                if (x > maxScroll) x = 0;
                track.style.transform = `translateX(-${x}px)`;
            });
        });

        // Video Modal for Video Gallery tab
        // Ensure modal markup exists in the DOM
        let videoModal = document.getElementById('video-modal');
        let videoIframe = document.getElementById('video-iframe');
        let videoClose = document.getElementById('close-modal');

        // If modal markup doesn't exist, inject it
        if (!videoModal) {
            videoModal = document.createElement('div');
            videoModal.id = 'video-modal';
            videoModal.className = 'fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-80 hidden';
            videoModal.innerHTML = `
                <div class="relative w-full max-w-2xl p-4">
                    <button id="close-modal" class="absolute top-2 right-2 text-white text-2xl">&times;</button>
                    <div class="aspect-w-16 aspect-h-9">
                        <iframe id="video-iframe" width="560" height="315" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen referrerpolicy="strict-origin-when-cross-origin"></iframe>
                    </div>
                </div>
            `;
            document.body.appendChild(videoModal);
            videoIframe = document.getElementById('video-iframe');
            videoClose = document.getElementById('close-modal');
        }

        // Click handler for video items in Video Gallery tab
        function attachVideoClickHandlers() {
            document.querySelectorAll('#ytabs-yt img.video-thumbnail[data-video]').forEach(el => {
                el.addEventListener('click', function(e) {
                    e.preventDefault();
                    const embedUrl = this.getAttribute('data-video');
                    if (embedUrl && videoModal && videoIframe) {
                        // Add required parameters to prevent Error 153
                        const origin = window.location.origin;
                        const separator = embedUrl.includes('?') ? '&' : '?';
                        const fullUrl = `${embedUrl}${separator}autoplay=1&enablejsapi=1&origin=${encodeURIComponent(origin)}&widget_referrer=${encodeURIComponent(origin)}`;
                        videoIframe.src = fullUrl;
                        videoModal.classList.remove('hidden');
                        videoModal.classList.add('flex');
                    }
                });
            });
        }
        
        // Attach handlers immediately and retry if elements not found
        if (document.querySelectorAll('#ytabs-yt img.video-thumbnail[data-video]').length > 0) {
            attachVideoClickHandlers();
        } else {
            // Retry after a short delay if DOM not ready
            setTimeout(attachVideoClickHandlers, 100);
        }

        // Close modal logic
        function closeVideoModal() {
            if (videoModal && videoIframe) {
                videoModal.classList.add('hidden');
                videoModal.classList.remove('flex');
                videoIframe.src = '';
            }
        }
        if (videoClose) {
            videoClose.addEventListener('click', closeVideoModal);
        }
        if (videoModal) {
            videoModal.addEventListener('click', function(e) {
                if (e.target === videoModal) {
                    closeVideoModal();
                }
            });
        }
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && videoModal && !videoModal.classList.contains('hidden')) {
                closeVideoModal();
            }
        });
    </script>

    {{-- Quote Click Functionality --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all quote cards
            const quoteCards = document.querySelectorAll('.quote-card');
            const mainQuoteText = document.getElementById('mainQuoteText');
            const mainQuoteAuthor = document.getElementById('mainQuoteAuthor');
            const mainQuoteBlock = document.getElementById('mainQuoteBlock');

            if (quoteCards.length > 0 && mainQuoteText && mainQuoteAuthor) {
                quoteCards.forEach(function(card) {
                    card.addEventListener('click', function() {
                        // Get quote data from data attributes
                        const quoteText = this.getAttribute('data-quote-text');
                        const quoteAuthor = this.getAttribute('data-quote-author');

                        // Update main quote with fade effect
                        if (mainQuoteBlock) {
                            mainQuoteBlock.style.opacity = '0';

                            setTimeout(function() {
                                mainQuoteText.textContent = quoteText;
                                mainQuoteAuthor.textContent = quoteAuthor;
                                mainQuoteBlock.style.transition = 'opacity 0.5s ease-in-out';
                                mainQuoteBlock.style.opacity = '1';
                            }, 300);
                        } else {
                            mainQuoteText.textContent = quoteText;
                            mainQuoteAuthor.textContent = quoteAuthor;
                        }

                        // Scroll to top of quote section smoothly
                        const quoteSection = document.querySelector('.amaippai-quote-area');
                        if (quoteSection) {
                            quoteSection.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }

                        // Add visual feedback - highlight the clicked card temporarily
                        quoteCards.forEach(c => c.style.transform = 'scale(1)');
                        this.style.transform = 'scale(1.05)';
                        setTimeout(() => {
                            this.style.transform = 'scale(1)';
                        }, 300);
                    });

                    // Add hover effect
                    card.addEventListener('mouseenter', function() {
                        this.style.transform = 'translateY(-5px)';
                        this.style.transition = 'transform 0.3s ease';
                    });

                    card.addEventListener('mouseleave', function() {
                        this.style.transform = 'translateY(0)';
                    });
                });
            }
        });
    </script>
@endsection