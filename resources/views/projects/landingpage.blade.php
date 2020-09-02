@extends('layouts.layouts')

@section('title', 'Max Nierste Landing Page')

@section('content')

<div class="aboutTitle position-relative overflow-hidden sectionBackgroundGray">
  <div class="curved">
    <div class="col-8 p-t-md text-center mx-auto">
      <h1 class="display-4 font-weight-normal">Landing Page</h1>
      <p class="lead font-weight-normal">Nullam id dolor id nibh ultricies
        vehicula ut id elit. cursus magna.</p>
      <a class="btn btn-grad" href="#">See Details</a>
    </div>
  </div>
</div>

<div class="container-fluid marketing text-center m-b-md spikes">
  <!-- Three columns of text below the carousel -->
  <div class="row aboutTitle p-t-lg">
    <div class="col-4">
      <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
      xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
      focusable="false" role="img" aria-label="Placeholder: 140x140">
        <title>Placeholder</title>
        <rect width="100%" height="100%" fill="#eee"/>
        <text x="25%" y="50%" fill="#777">140x140</text>
      </svg>
      <h2>Heading</h2>
      <p>Nullam id dolor id nibh ultricies vehicula ut id elit. cursus magna.</p>
      <p>
        <a class="btn btn-black" href="#" role="button">View details &raquo;</a>
      </p>
    </div><!-- /.col-lg-4 -->

    <div class="col-4">
      <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
      xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
      focusable="false" role="img" aria-label="Placeholder: 140x140">
        <title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/>
        <text x="25%" y="50%" fill="#777">140x140</text>
      </svg>
      <h2>Heading</h2>
      <p> Sem nec elit. Cras mattis consectetur purus sit amet fermentum. </p>
      <p>
        <a class="btn btn-black" href="#" role="button">View details &raquo;</a>
      </p>
    </div><!-- /.col-lg-4 -->

    <div class="col-4">
      <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
      xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
      focusable="false" role="img" aria-label="Placeholder: 140x140">
        <title>Placeholder</title>
        <rect width="100%" height="100%" fill="#eee"/>
        <text x="25%" y="50%" fill="#777">140x140</text>
      </svg>
      <h2>Heading</h2>
      <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in,
        egestas eget quam. </p>
      <p>
        <a class="btn btn-black" href="#" role="button">View details &raquo;</a>
      </p>
    </div><!-- /.col-lg-4 -->
  </div><!-- /.row -->

</div>

<section class="pull-forward">
  <div class="container m-t-md m-b-md">
    <!-- START THE FEATURETTES -->
    <div class="row featurette p-t-lg ">
      <div class="col-md-7 center">
        <div class="col-12 text-center p-a-0">
          <div class="row">
            <div class="col-12">
              <h2 class="featurette-heading">First featurette heading.
                <span class="text-muted">It’ll blow your mind.</span>
              </h2>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <p class="lead">Donec ullamcorper nulla non metus auctor fringilla.
                Vestibulum id ligula porta felis euismod semper. Praesent commodo
                cursus magna, vel scelerisque nisl consectetur. Fusce dapibus,
                tellus ac cursus commodo.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
        width="500" height="500" xmlns="http://www.w3.org/2000/svg"
        preserveAspectRatio="xMidYMid slice" focusable="false" role="img"
        aria-label="Placeholder: 500x500">
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="#eee"/>
          <text x="45%" y="50%" fill="#aaa">500x500</text>
        </svg>
      </div>
    </div>
  </div>
</section>

<div class=" ">
  <div class="diagonal-box m-b-md">
  	<div class="diagonal-content">
      <div class="aboutTitle pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Pricing</h1>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla.
          Vestibulum id ligula porta felis euismod semper. Praesent commodo
          cursus magna, vel scelerisque nisl consectetur.</p>
      </div>
      <div class="container">
        <div class="card-deck mb-3 text-center">
          <div class="card mb-4 shadow-sm">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal">Free</h4>
            </div>
            <div class="card-body">
              <h1 class="card-title pricing-card-title">$0
                <small class="text-muted">/ mo</small>
              </h1>
              <ul class="list-unstyled mt-3 mb-4">
                <li>10 users included</li>
                <li>2 GB of storage</li>
                <li>Email support</li>
                <li>Help center access</li>
              </ul>
              <button type="button" class="btn btn-lg btn-block btn-outline-black">
                Sign up for free
              </button>
            </div>
          </div>
          <div class="card mb-4 shadow-sm">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal">Pro</h4>
            </div>
            <div class="card-body">
              <h1 class="card-title pricing-card-title">$15
                <small class="text-muted">/ mo</small>
              </h1>
              <ul class="list-unstyled mt-3 mb-4">
                <li>20 users included</li>
                <li>10 GB of storage</li>
                <li>Priority email support</li>
                <li>Help center access</li>
              </ul>
              <button type="button" class="btn btn-lg btn-block btn-grad">
                Get started
              </button>
            </div>
          </div>
          <div class="card mb-4 shadow-sm">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal">Enterprise</h4>
            </div>
            <div class="card-body">
              <h1 class="card-title pricing-card-title">$29
                <small class="text-muted">/ mo</small>
              </h1>
              <ul class="list-unstyled mt-3 mb-4">
                <li>30 users included</li>
                <li>15 GB of storage</li>
                <li>Phone and email support</li>
                <li>Help center access</li>
              </ul>
              <button type="submit" class="btn btn-lg btn-block btn-grad">
                Contact us
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container m-t-md m-b-md">
  <div class="row featurette">
    <div class="col-md-7 order-md-2 center">
      <div class="col-12 text-center">
        <div class="row">
          <div class="col-12">
            <h2 class="featurette-heading">Oh yeah, it’s that good.
              <span class="text-muted">See for yourself.</span>
            </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla.
              Vestibulum id ligula porta felis euismod semper. Praesent commodo
              cursus magna, vel scelerisque nisl consectetur. Fusce dapibus,
              tellus ac cursus commodo.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-5 order-md-1">
      <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
      width="500" height="500" xmlns="http://www.w3.org/2000/svg"
      preserveAspectRatio="xMidYMid slice" focusable="false" role="img"
      aria-label="Placeholder: 500x500">
        <title>Placeholder</title>
        <rect width="100%" height="100%" fill="#eee"/>
        <text x="45%" y="50%" fill="#aaa" dy=".3em">500x500</text>
      </svg>
    </div>
  </div>
</div>

<div class="counter-background p-t-md p-b-md">
  <div class="container">
    <div class="row text-center aboutTitle">
  	   <div class="col">
  	      <div class="counter">
            <i class="fa fa-line-chart fa-2x"></i>
            <h2 class="timer count-title count-number" data-to="16782" data-speed="1200"></h2>
            <p class="count-text ">Sales</p>
          </div>
      </div>
      <div class="col">
        <div class="counter">
          <i class="fa fa-users fa-2x"></i>
          <h2 class="timer count-title count-number" data-to="86" data-speed="1200"></h2>
          <p class="count-text ">New Employees</p>
        </div>
      </div>
      <div class="col">
        <div class="counter">
          <i class="fa fa-pied-piper fa-2x"></i>
          <h2 class="timer count-title count-number" data-to="139567" data-speed="1200"></h2>
          <p class="count-text ">Packages Sold</p>
        </div>
      </div>
      <div class="col">
        <div class="counter">
          <i class="fa fa-pied-piper-pp fa-2x"></i>
          <h2 class="timer count-title count-number" data-to="667" data-speed="1200"></h2>
          <p class="count-text ">New Partners</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="sectionBackgroundGrad p-t-md p-b-md">
  <div class="container">
    <div class="row text-center">
      <div class="col-12">
        <h2 class="aboutTitle">Subscribe to Our Newsletter</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 col-sm-12">
        <p class="aboutTitle">Donec ullamcorper nulla non metus auctor
          fringilla. Vestibulum id ligula porta felis euismod semper.
          Praesent commodo cursus magna, vel scelerisque nisl consectetur.
          Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-4 col-sm-12">
        <form action="#" method="#">
          @csrf
          <div class="form-group">
            <label class="aboutTitle" for="Email">Email</label>
            <div class="input-group">
              <input type="email" class="form-control" id="Email"  name="email"
              placeholder="Enter email">
                <span>
                  <button type="#" class="btn btn-black">Subscribe</button>
                </span>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection


@section('scripts')
  <script>
  (function ($) {
	$.fn.countTo = function (options) {
		options = options || {};

		return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);

			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;

			// references & variables that will change with each update
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};

			$self.data('countTo', data);

			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);

			// initialize the element with the starting value
			render(value);

			function updateTimer() {
				value += increment;
				loopCount++;

				render(value);

				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}

				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;

					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}

			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};

	$.fn.countTo.defaults = {
		from: 0,               // the number the element should start at
		to: 0,                 // the number the element should end at
		speed: 1000,           // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,           // the number of decimal places to show
		formatter: formatter,  // handler for formatting the value before rendering
		onUpdate: null,        // callback method for every time the element is updated
		onComplete: null       // callback method for when the element finishes updating
	};

	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
	formatter: function (value, options) {
	  return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
	}
  });

  // start all the timers
  $('.timer').each(count);

  function count(options) {
	var $this = $(this);
	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
	$this.countTo(options);
  }
});
</script>
@endsection
