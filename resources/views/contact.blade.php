@extends('layouts.secondary')

@section('content')
    <section s-sec="contact" class="main">
        <div>
            <article>
                <h2 class="title">Send us a Message</h2>
                <p class="text">
                    Do you have questions, suggestions or comments? It is important
                    for us to know your opinion, please write us, We'd love to
                    hear from you.
                </p>
                <contact-form></contact-form>
            </article>
            <article>
                <ul v-animate.repeat="'slide-left'" class="address-list">
                    <ol>
                        <icon name="address"></icon>
                        <p class="text">
                            <span class="subtitle">Address</span>
                            3070 West Sirius Ave. Unit #108<br><b>Las Vegas NV 89102</b>
                        </p>
                    </ol>
                    <ol>
                        <icon name="phone"></icon>
                        <p class="text">
                            <span class="subtitle">Phone</span>
                            <span><b>(702)</b> 722 3197</span>
                        </p>
                    </ol>
                    <ol>
                        <icon name="fax"></icon>
                        <p class="text">
                            <span class="subtitle">Fax</span>
                            <span><b>(702)</b> 891 0556</span>
                        </p>
                    </ol>
                    <ol>
                        <icon name="cell"></icon>
                        <p class="text">
                            <span class="subtitle">Cell</span>
                            <span><b>(702)</b> 401 0941</span>
                        </p>
                    </ol>
                    <ol>
                        <icon name="email"></icon>
                        <p class="text">
                            <span class="subtitle">E Mail</span>
                            allamericanfinishingfab@gmail.com <br>
                            allamericanfinishingfab@yahoo.com <br>
                            lalo@allamericanfinishing.com
                        </p>
                    </ol>
                </ul>
            </article>
        </div>
        <div class="map-cont">
	    <article class="map mapouter">
		<div class="gmap_canvas">
			<iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=all%20american%20finishing&t=&z=13&ie=UTF8&iwloc=&output=embed&ll=36.1039966,-115.1822" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
			</div>
		</article>
            <article v-animate.repeat="'slide-left'">
		<ul class="schedule-list">
			<ol>
				<icon name="clock"></icon>
				<span class="subtitle">Opening Hours</span>
			</ol>
                    <ol>
                        <article>
                            <ul class="text">
                                <li>
                                    Monday
                                    <span>
                                        07:00 - 16:30
                                    </span>
                                </li>
                                <li>
                                    Tuesday
                                    <span>
                                        07:00 - 16:30
                                    </span>
                                </li>
                                <li>
                                    Wednesday
                                    <span>
                                        07:00 - 16:30
                                    </span>
                                </li>
                                <li>
                                    Thursday
                                    <span>
                                        07:00 - 16:30
                                    </span>
                                </li>
                                <li>
                                    Friday
                                    <span>
                                        07:00 - 16:30
                                    </span>
                                </li>
                                <li>
                                    Saturday
                                    <span>
                                        Closed
                                    </span>
                                </li>
                                <li>
                                    Sunday
                                    <span>
                                        Closed
                                    </span>
                                </li>
                            </ul>
                        </article>
                    </ol>
                </ul>
            </article>
	</div>
    </section>
@endsection
