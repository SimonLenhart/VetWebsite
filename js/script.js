$(document).ready(() => {
  // Add one more element, if there is uneven number of employees
  if ($(".teamMemberWrapper")) {
    if ($(".teamMemberWrapper .memberItem").length % 2 !== 0) {
      $(".teamMemberWrapper").append(
        "<div class='memberItem' style='border: 0 !important;'></div>"
      );
    }
    // Let Lebenslauf appear on click
    $(".teamMemberWrapper .memberItem").on({
      click: function (e) {
        $($(this)[0].children[1].children[2]).toggleClass("active");
      },
    });

    //Add bullet point in every new row in table
    $(".teamMemberWrapper .memberItem td:first-of-type").prepend("• ");

    //If the Lebenslauf of Dr. Münker is clicked, open new window
    $(".teamMemberWrapper .memberItem:first-of-type").click(() => {
      window.open("./profil-dr-muenker", "_blank");
    });
    $(".teamMemberWrapper .memberItem:nth-child(2)").click(() => {
      window.open("./profil-dr-lenhart", "_blank");
    });
  }

  // Shows the picture big and in the middle on the page "Praxisräume"
  /* 	if ($(".elementor-22")) {
		// create references to the modal...
var modal = document.getElementById('myModal');
// to all images -- note I'm using a class!
var images = document.getElementsByTagName('img');
// the image in the modal
var modalImg = document.getElementById("img01");
// and the caption in the modal
var captionText = document.getElementById("caption");

// Go through all of the images with our custom class
for (var i = 0; i < images.length; i++) {
  var img = images[i];
  // and attach our click listener for this image.
  img.onclick = function(evt) {
    console.log(evt);
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }
}

var span = document.getElementsByClassName("close")[0];

span.onclick = function() {
  modal.style.display = "none";
}

	}
	 */

  gsap.registerPlugin(ScrollTrigger);

  // Animation for the header
  const headerAnimation = gsap
    .from("#masthead", {
      yPercent: -100,
      opacity: 0,
      paused: true,
      duration: 0.1,
    })
    .progress(1);

  ScrollTrigger.create({
    start: "top top",
    end: 99999,
    onUpdate: (self) => {
      // eslint-disable-next-line no-unused-expressions
      self.direction === -1
        ? headerAnimation.play()
        : headerAnimation.reverse();
    },
  });
});
