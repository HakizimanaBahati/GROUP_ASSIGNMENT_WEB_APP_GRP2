<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h1>STUDENT REGISTRATION FORM</h1>

        <form id="regForm" method="POST" action="insert.php" onsubmit="return validateForm()">
            <table class="form-table">
                <tr>
                    <td class="label-col">FIRST NAME</td>
                    <td><input type="text" name="first_name" required></td>
                </tr>
                <tr>
                    <td class="label-col">LAST NAME</td>
                    <td><input type="text" name="last_name"></td>
                </tr>
                <tr>
                    <td class="label-col">DATE OF BIRTH</td>
                    <td class="dob-row">
                        <select name="day" required>
                            <option value="">Day</option>
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
                        </select>
                        <select name="month" required>
                            <option value="">Month</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                        <select name="year" required>
                            <option value="">Year</option>
                            <option value="2004">2004</option>
                            <option value="2005">2005</option>
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label-col">EMAIL ID</td>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <td class="label-col">MOBILE NUMBER</td>
                    <td><input type="tel" name="mobile"></td>
                </tr>
                <tr>
                    <td class="label-col">GENDER</td>
                    <td class="radio-row">
                        <label><input type="radio" name="gender" value="Male" required> Male</label>
                        <label><input type="radio" name="gender" value="Female"> Female</label>
                    </td>
                </tr>
                <tr>
                    <td class="label-col">ADDRESS</td>
                    <td><textarea name="address" rows="4"></textarea></td>
                </tr>
                <tr>
                    <td class="label-col">CITY</td>
                    <td><input type="text" name="city"></td>
                </tr>
                <tr>
                    <td class="label-col">PIN CODE</td>
                    <td><input type="text" name="pin_code"></td>
                </tr>
                <tr>
                    <td class="label-col">STATE</td>
                    <td><input type="text" name="state"></td>
                </tr>
                <tr>
                    <td class="label-col">COUNTRY</td>
                    <td><select name="country" required>
                        <option value="">Select Country</option>
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Brazil">Brazil</option>
                        <option value="Brunei">Brunei</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cabo Verde">Cabo Verde</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Eswatini">Eswatini</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Greece">Greece</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India" selected>India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Iran">Iran</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Laos">Laos</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libya">Libya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Micronesia">Micronesia</option>
                        <option value="Moldova">Moldova</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montenegro">Montenegro</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="North Korea">North Korea</option>
                        <option value="North Macedonia">North Macedonia</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau">Palau</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Romania">Romania</option>
                        <option value="Russia">Russia</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                        <option value="Saint Lucia">Saint Lucia</option>
                        <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                        <option value="Samoa">Samoa</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Serbia">Serbia</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="South Korea">South Korea</option>
                        <option value="South Sudan">South Sudan</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syria">Syria</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Timor-Leste">Timor-Leste</option>
                        <option value="Togo">Togo</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Vatican City">Vatican City</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </select></td>
                </tr>
                <tr>
                    <td class="label-col">HOBBIES</td>
                    <td>
                        <div class="hobby-row">
                            <label><input type="checkbox" name="hobbies[]" value="Drawing"> Drawing</label>
                            <label><input type="checkbox" name="hobbies[]" value="Singing"> Singing</label>
                            <label><input type="checkbox" name="hobbies[]" value="Dancing"> Dancing</label>
                            <label><input type="checkbox" name="hobbies[]" value="Sketching"> Sketching</label>
                            <label><input type="checkbox" name="hobbies[]" value="Others"> Others</label>
                        </div>
                        <div class="other-hobby-row">
                            <label class="small-label">Others</label>
                            <input type="text" name="other_hobby" placeholder="Please specify">
                        </div>
                    </td>
                </tr>
            </table>

            <div class="qualification-section">
                <div class="qualification-label">QUALIFICATION</div>
                <div class="qualification-content">
                    <div class="qualification-row qualification-header">
                        <div class="qualification-number">Sl.No.</div>
                        <div class="qualification-name">Examination</div>
                        <div class="qualification-field">Board</div>
                        <div class="qualification-field">Percentage</div>
                        <div class="qualification-field">Year of Passing</div>
                    </div>
                    <div class="qualification-row">
                        <div class="qualification-number">1</div>
                        <div class="qualification-name">Class X</div>
                        <div class="qualification-field"><input type="text" name="board1"></div>
                        <div class="qualification-field"><input type="text" name="percentage1"></div>
                        <div class="qualification-field"><input type="text" name="year1"></div>
                    </div>
                    <div class="qualification-row">
                        <div class="qualification-number">2</div>
                        <div class="qualification-name">Class XII</div>
                        <div class="qualification-field"><input type="text" name="board2"></div>
                        <div class="qualification-field"><input type="text" name="percentage2"></div>
                        <div class="qualification-field"><input type="text" name="year2"></div>
                    </div>
                    <div class="qualification-row">
                        <div class="qualification-number">3</div>
                        <div class="qualification-name">Graduation</div>
                        <div class="qualification-field"><input type="text" name="board3"></div>
                        <div class="qualification-field"><input type="text" name="percentage3"></div>
                        <div class="qualification-field"><input type="text" name="year3"></div>
                    </div>
                    <div class="qualification-row">
                        <div class="qualification-number">4</div>
                        <div class="qualification-name">Masters</div>
                        <div class="qualification-field"><input type="text" name="board4"></div>
                        <div class="qualification-field"><input type="text" name="percentage4"></div>
                        <div class="qualification-field"><input type="text" name="year4"></div>
                    </div>
                    <div class="qualification-note-row">
                        <div class="qualification-note-spacer"></div>
                        <div class="qualification-note-spacer"></div>
                        <div class="qualification-note">(10 char max)</div>
                        <div class="qualification-note">(upto 2 decimal)</div>
                        <div class="qualification-note-spacer"></div>
                    </div>
                </div>
            </div>

            <div class="course-row">
                <div class="course-label">COURSES APPLIED FOR</div>
                <div class="course-options">
                    <label><input type="radio" name="course" value="BCA"> BCA</label>
                    <label><input type="radio" name="course" value="BCom"> B.Com</label>
                    <label><input type="radio" name="course" value="BSc"> B.Sc</label>
                    <label><input type="radio" name="course" value="BA"> B.A</label>
                </div>
            </div>

            <div class="button-row">
                <button type="submit">Submit</button>
                <button type="reset">Reset</button>
            </div>
        </form>
    </div>

    <div class="footer-box">
        <h2>Welcome to Plantas Restaurant</h2>
        <p>Now that you've got instructions, resources, and lots of inspiration, go forth and choose your dream restaurant name.</p>
        <div class="footer-links">
            <a href="#">Home</a>
            <a href="#">About Us</a>
            <a href="#">Gallery</a>
            <a href="#">Order Now</a>
            <a href="#">Products</a>
            <a href="#">Contact us</a>
        </div>
        <p>Now that you've got instructions, resources, and lots of inspiration, go forth and choose your dream restaurant name.</p>
        <p>Now that you've got instructions, resources, and lots of inspiration, go forth and choose your dream restaurant name.</p>
    </div>

    <script>
        function validateForm() {
            const form = document.getElementById('regForm');
            const firstName = form.first_name.value.trim();
            const email = form.email.value.trim();
            const gender = form.gender.value;
            const course = form.course.value;

            if (!firstName) {
                alert('Please enter FIRST NAME');
                return false;
            }
            if (!email) {
                alert('Please enter EMAIL ID');
                return false;
            }
            if (!gender) {
                alert('Please select GENDER');
                return false;
            }
            if (!course) {
                alert('Please select a COURSE');
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
