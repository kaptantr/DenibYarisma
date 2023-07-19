		var tpj=jQuery;					
					var revapi48;
					tpj(document).ready(function() {
						if(tpj("#rev_slider_48_1").revolution == undefined){
							revslider_showDoubleJqueryError("#rev_slider_48_1");
						}else{
							revapi48 = tpj("#rev_slider_48_1").show().revolution({
								sliderType:"standard",
								jsFileLocation:"assets/",
								sliderLayout:"fullscreen",
								dottedOverlay:"none",
								delay:9000,
								navigation: {
									keyboardNavigation:"off",
									keyboard_direction: "horizontal",
									mouseScrollNavigation:"off",
									onHoverStop:"off",
									touch:{
										touchenabled:"on",
										swipe_threshold: 75,
										swipe_min_touches: 1,
										swipe_direction: "horizontal",
										drag_block_vertical: false
									},
								 bullets:{
         style:"",
         enable:true,
         hide_onmobile:true,
         hide_onleave:true,
         hide_delay:200,
         hide_delay_mobile:1200,
         hide_under:0,
         hide_over:9999,
         tmp:'<span class="tp-bullet-image"></span><span class="tp-bullet-title"></span>', 
         direction:"vertical",
         space:15,       
         h_align:"bottom",
         v_align:"right",
         h_offset:0,
         v_offset:20
        }
								
								
								
								},
								 
         
								responsiveLevels:[1240,1024,778,480],
								gridwidth:[1240,1024,778,480],
								gridheight:[868,768,960,720],
								lazyType:"none",
								shadow:0,
								spinner:"off",
								stopLoop:"on",
								stopAfterLoops:0,
								stopAtSlide:1,
								shuffle:"off",
								autoHeight:"off",
								fullScreenAlignForce:"off",
								fullScreenOffsetContainer: "",
								fullScreenOffset: "",
								disableProgressBar:"on",
								hideThumbsOnMobile:"off",
								hideSliderAtLimit:0,
								hideCaptionAtLimit:0,
								hideAllCaptionAtLilmit:0,
								debugMode:false,
								fallbacks: {
									simplifyAll:"off",
									nextSlideOnWindowFocus:"off",
									disableFocusListener:false,
								}
							});
						}
					});	/*ready*/