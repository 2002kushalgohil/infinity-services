const userDashBoardSearchBx = document.getElementById("userDashBoardSearchBx");
const userSearchChkBx = document.getElementById("userSearchChkBx");

userDashBoardSearchBx.addEventListener("click", () => {
  userSearchChkBx.checked = !userSearchChkBx.checked;
});
