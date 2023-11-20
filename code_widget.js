let images = [
    "img/widgets/wdg2.png",
    "img/widgets/wdg1.png",
    "img/widgets/wdg3.png"
];

let leftIndex = 0; 
let centerIndex = 1;
let rightIndex = 2;

function updateImages(center_i, left_i, right_i)
{    
    document.querySelector(".slides-one img").src = images[left_i];

    document.querySelector(".slides-two img").src = images[center_i];

    document.querySelector(".slides-three img").src = images[right_i];

    console.log(left_i);
    console.log(center_i);
    console.log(right_i);
}

function nextSlide()
{
    updateImages(centerIndex, leftIndex, rightIndex);
    centerIndex = (centerIndex + 1) % images.length;
    leftIndex = (leftIndex + 1) % images.length;
    rightIndex = (rightIndex + 1) % images.length;
}

setInterval(nextSlide, 5000);