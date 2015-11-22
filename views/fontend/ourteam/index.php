 <style>
 	/*reset
html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video,p{border:0;font-size:100%;font:inherit;vertical-align:baseline;margin:0;padding:0}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:none}table{border-collapse:collapse;border-spacing:0}
*/
 </style>
 <div id="main_all">
        	<h2 class="topic">ทีมงาน <img src="<?php echo WEB_PATH;?>/assets/images/h_topic.png" /></h2>
            <div class="o clear"> 
            	<div class="team_sec1" style="padding: 20px;">
                	<h3>Supreme-HITERA CO.,LTD.</h3>
                    <p>     supreme Hitera ดำเนินธุรกิจพัฒนาระบบที่ใช้งานกับเครื่องมือแพทย์ โดยมีทีมงานมืออาชีพ ที่คอยพัฒนา ดูแล รวมถึงแก้ปัญหาได้อย่างทันท่วงที</p>
                </div>
                <div class="team_secH"><img src="<?php echo WEB_PATH;?>/assets/images/ourteam.jpg"  /></div>
                <div class="teamBox hitSI">
                	<h2  class="text-right">แผนก HIT-SI</h2>
                    <ul id="ul_left">
                    	<? foreach($ourteam_hitsi as $data){?>
                    	<li>
                        	<div class="teamName">
                            	<h2><?=$data["ourteam_name"]?> (<?=$data["ourteam_nickname"]?>)</h2>
                            	<h3><?=$data["ourteam_position"]?></h3>
                            </div>
                            <div class="teamPic"><img src="<?php echo WEB_PATH?>/upload/ourteam/<?php echo $data["ourteam_id"].".".$data["file_type"];?>" height="100px" width="130px" /><span></span></div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="teamBox hitSD">
                	<h2>แผนก HIT-SD</h2>
                    <ul id="ul_right">
                    	<? foreach($ourteam_hitsd as $data){?>
                    	<li>
                    		<div class="teamPic"><img src="<?php echo WEB_PATH?>/upload/ourteam/<?php echo $data["ourteam_id"].".".$data["file_type"];?>" height="100px" width="130px" /><span></span></div>
                        	<div class="teamName">
                            	<h2><?=$data["ourteam_name"]?> (<?=$data["ourteam_nickname"]?>)</h2>
                            	<h3><?=$data["ourteam_position"]?></h3>
                            </div>
                            
                        </li>
                        <?php } ?>
                    </ul>
                </div>   
            </div>
</div>
<!--<div id="main_all">
        	<h2 class="topic">ทีมงาน <img src="<?php echo WEB_PATH;?>/assets/images/h_topic.png" /></h2>
            <div class="o clear">
            
            	<div class="team_sec1">
                	<div class="pad15 o">
                    	<div class="teampic fL"><img src="<?php echo WEB_PATH;?>/assets/images/teampic.jpg"  /></div>
                        <div class="teamtxt fR">
                        	<b>Supreme-HITERA CO.,LTD.</b><br />
                            <p>จากประสบการณ์การดำเนินงานทางด้านการแพทย์เป็นเวลากว่า 30 ปี 
                            เราได้เล็งเห็นว่า IT เป็นส่วนที่เพิ่มศักยภาพการให้บริการด้านการแพทย์ 
                            จึงทำให้ได้จัดตั้ง บริษัท “ไฮทีร่า จำกัด ในปี 2553 ดำเนินงานทางด้านการ
                            พัฒนาระบบสารสนเทศ ทางการแพทย์ โดยมีบุคคลากรที่มีความเชี่ยวชาญ
                            ด้านไอที</p>
                        </div>
                    </div>
                </div>
                <div class="team_sec2 marT10">
                	<div class="pad15 o">
                        <div class="teamtxt fL">
                        	<b>Supreme-HITERA CO.,LTD.</b><br />
                            <p>จากประสบการณ์การดำเนินงานทางด้านการแพทย์เป็นเวลากว่า 30 ปี 
                            เราได้เล็งเห็นว่า IT เป็นส่วนที่เพิ่มศักยภาพการให้บริการด้านการแพทย์ 
                            จึงทำให้ได้จัดตั้ง บริษัท “ไฮทีร่า จำกัด ในปี 2553 ดำเนินงานทางด้านการ
                            พัฒนาระบบสารสนเทศ ทางการแพทย์ โดยมีบุคคลากรที่มีความเชี่ยวชาญ
                            ด้านไอที</p>
                        </div>
                        <div class="teampic fR"><img src="<?php echo WEB_PATH;?>/assets/images/teampic.jpg"  /></div>
                    </div>
                </div>
                
            </div>
        </div><!--End Main-->