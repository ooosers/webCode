<?php
	//session_start();

	include("connection.php");

#	$query="UPDATE posters SET descrition='".mysqli_real_escape_string($link, $_POST['poster'])."' WHERE id='".$_SESSION['id']."'LIMIT 1";
	
#	mysqli_query($link,$query);

    if ($_POST['saveSetting']=="Save Setting"){

        $query="UPDATE searchsettings SET `keyword`='".mysqli_real_escape_string($link, $_POST['keyword'])."',`category`='".mysqli_real_escape_string($link, $_POST['category'])."',`reward`='".mysqli_real_escape_string($link, $_POST['reward'])."',`minprice`='".mysqli_real_escape_string($link, $_POST['minprice'])."',`distance`='".mysqli_real_escape_string($link, $_POST['distance'])."' WHERE id='".$_COOKIE['id']."'LIMIT 1";

        mysqli_query($link,$query);
        
    }
echo "Welcome, ".$_COOKIE['id'];

?>


<form method="post">

	<div>starttime</div>
    <div>

    		<select name="starttimeMonth" id="starttimeMonth" title="Month" class="">
    			<option value="0" selected="1">Month</option>
    			<option value="1">Jan</option>
    			<option value="2">Feb</option>
    			<option value="3">Mar</option>
    			<option value="4">Apr</option>
    			<option value="5">May</option>
    			<option value="6">Jun</option>
    			<option value="7">Jul</option>
    			<option value="8">Aug</option>
   				<option value="9">Sep</option>
   				<option value="10">Oct</option>
   				<option value="11">Nov</option>
   				<option value="12">Dec</option>
    		</select>
    		/<select name="starttimeDay" id="starttimeDay" title="Day" class="">
    			<option value="0" selected="1">Day</option>
    			<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
    			<option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
    			<option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option>
    			<option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
    			<option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option>
    			<option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option>
    			<option value="31">31</option>
   			</select>
   			/<select name="starttimeYear" id="starttimeYear" title="Year" class="">
    			<option value="2015" selected="1">2015</option>
    			<option value="2016">2016</option>
    			<option value="2017">2017</option>
    		</select>
    		<select name="starttimeHour" id="starttimeHour" title="Hour" class="">
    			<option value="0" selected="1">Hour</option>
    			<option value="01">01</option>
    			<option value="02">02</option>
    			<option value="03">03</option>
    			<option value="04">04</option>
    			<option value="05">05</option>
    			<option value="06">06</option>
    			<option value="07">07</option>
    			<option value="08">08</option>
    			<option value="09">09</option>
    			<option value="10">10</option>
    			<option value="11">11</option>
    			<option value="12">12</option>
    		</select>
    		:<select name="starttimeMinute" id="starttimeMinute" title="Minute" class="">
    			<option value="0" selected="1">00</option>
    			<option value="1">01</option>
    			<option value="2">02</option>
    			<option value="3">03</option>
    			<option value="4">04</option>
    			<option value="5">05</option>
    			<option value="6">06</option>
    			<option value="7">07</option>
    			<option value="8">08</option>
    			<option value="9">09</option>
    			<option value="10">10</option>
    			<option value="11">11</option>
    			<option value="12">12</option>
    			<option value="13">13</option>
    			<option value="14">14</option>
    			<option value="15">15</option>
    			<option value="16">16</option>
    			<option value="17">17</option>
    			<option value="18">18</option>
    			<option value="19">19</option>
    			<option value="20">20</option>
    			<option value="21">21</option>
    			<option value="22">22</option>
    			<option value="23">23</option>
    			<option value="24">24</option>
    			<option value="25">25</option>
    			<option value="26">26</option>
    			<option value="27">27</option>
    			<option value="28">28</option>
    			<option value="29">29</option>
    			<option value="30">30</option>
    			<option value="31">31</option>
    			<option value="32">32</option>
    			<option value="33">33</option>
    			<option value="34">34</option>
    			<option value="35">35</option>
    			<option value="36">36</option>
    			<option value="37">37</option>
    			<option value="38">38</option>
    			<option value="39">39</option>
    			<option value="40">40</option>
    			<option value="41">41</option>
    			<option value="42">42</option>
    			<option value="43">43</option>
    			<option value="44">44</option>
    			<option value="45">45</option>
    			<option value="46">46</option>
    			<option value="47">47</option>
    			<option value="48">48</option>
    			<option value="49">49</option>
    			<option value="50">50</option>
    			<option value="51">51</option>
    			<option value="52">52</option>
    			<option value="53">53</option>
    			<option value="54">54</option>
    			<option value="55">55</option>
    			<option value="56">56</option>
    			<option value="57">57</option>
    			<option value="58">58</option>
    			<option value="59">59</option>
    		</select>
    		<select name="starttimeAm" id="starttimeAm" title="AM" class="">
    			<option value="0" selected="1">AM</option>
    			<option value="1">PM</option>
    		</select>

    	</div>
    <div>endtime</div>
    <div>

            <select name="endtimeMonth" id="endtimeMonth" title="Month" class="">
                <option value="0" selected="1">Month</option>
                <option value="1">Jan</option>
                <option value="2">Feb</option>
                <option value="3">Mar</option>
                <option value="4">Apr</option>
                <option value="5">May</option>
                <option value="6">Jun</option>
                <option value="7">Jul</option>
                <option value="8">Aug</option>
                <option value="9">Sep</option>
                <option value="10">Oct</option>
                <option value="11">Nov</option>
                <option value="12">Dec</option>
            </select>
            /<select name="endtimeDay" id="endtimeDay" title="Day" class="">
                <option value="0" selected="1">Day</option>
                <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                <option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
                <option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option>
                <option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
                <option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option>
                <option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option>
                <option value="31">31</option>
            </select>
            /<select name="endtimeYear" id="endtimeYear" title="Year" class="">
                <option value="2015" selected="1">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
            </select>
            <select name="endtimeHour" id="endtimeHour" title="Hour" class="">
                <option value="0" selected="1">Hour</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
            :<select name="endtimeMinute" id="endtimeMinute" title="Minute" class="">
                <option value="0" selected="1">00</option>
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
                <option value="4">04</option>
                <option value="5">05</option>
                <option value="6">06</option>
                <option value="7">07</option>
                <option value="8">08</option>
                <option value="9">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
                <option value="32">32</option>
                <option value="33">33</option>
                <option value="34">34</option>
                <option value="35">35</option>
                <option value="36">36</option>
                <option value="37">37</option>
                <option value="38">38</option>
                <option value="39">39</option>
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
                <option value="44">44</option>
                <option value="45">45</option>
                <option value="46">46</option>
                <option value="47">47</option>
                <option value="48">48</option>
                <option value="49">49</option>
                <option value="50">50</option>
                <option value="51">51</option>
                <option value="52">52</option>
                <option value="53">53</option>
                <option value="54">54</option>
                <option value="55">55</option>
                <option value="56">56</option>
                <option value="57">57</option>
                <option value="58">58</option>
                <option value="59">59</option>
            </select>
            <select name="endtimeAm" id="endtimeAm" title="AM" class="">
                <option value="0" selected="1">AM</option>
                <option value="1">PM</option>
            </select>

        </div>





    <input type="text" placeholder="keyword" name="keyword" value=<?php echo $_POST['keyword']?> >
    <input type="text" placeholder="category" name="category" value=<?php echo $_POST['category']?> >
    <input type="text" placeholder="reward" name="reward" value=<?php echo $_POST['reward']?> >
    <input type="text" placeholder="minprice" name="minprice" value=<?php echo $_POST['minprice']?> >
    <input type="text" placeholder="distance" name="distance" value=<?php echo $_POST['distance']?> >

	<input type="submit" name="saveSetting" value="Save Setting"/>
    <input type="submit" name="search" value="search"/>

	<a href="http://79.170.44.213/yingzi0310.com/ooosers/index.php">back to main</a>
</form>



