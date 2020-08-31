# Bussiness-Listing-Web-Project

Feature for Seller:
* Listing can be added using a signup form choosing multiple options like category, sub-category, country, city, area.
- This category, sub-category will be linked to each other as added by admin from backend.
- Seller during selection can not only choose pre-defined list by admin but can also add new once.
* During signup, mobile no. OTP and email based verification needs to be done.
- Either do this at time of signup form only, or may be after signup, inside the login dashboard.
* Once signup done and mobile no. and email is not verified, seller can still login but profile will not be live.
* Listing should go live only after verification is done.
* Then after verification is done, business owner should login and complete its profile to 100%.
- No problem that profile is complete or not, the listing will still be visible live, immediately when mobile and email verification is done.
- A login dashboard needed for business owner.

Search Function:
* When user performs a search, the top 5 or 10 search result list should go to user’s registered mobile no. and may be email too.
* At that same point, the detail of that user who has searched for something will then go to 5 or 10 business owner’s mobile no. who appeared in that search.
- A general thing here is that because user has signed up and signed in and then only whole process can work only, otherwise not.


Function of Listing Addition:
* One process is stated above for how a business listing will get added.
* There will be one more process to add the listing.
* Any user/random person can come and add a listing on behalf of business owner.
* There will be a different sign up for such type of listing addition, let’s say “Refer Business”.
* So user will click on Refer Business and fill all details of the business and click submit.
* During filling the form, user will enter business owner’s mobile number.
* Immediately after doing this, listing will go live but there a batch type something will be shown with the listing indicating “Unverified Business.”
* So because user has entered mobile no., so once the user clicks submit, the listing will go live and at that same time, a message on mobile will go to business owner that his listing has been added and he can verify and claim his business.
* There will be a button visible live with such listing for “Claim This Business”.
* When clicked on the button “Claim This Business”, a pop-up will open saying to verify mobile no.
* The mobile no. which random user entered during adding the listing, the business owner will enter same mobile no. only and then the otp for verification will go to that no. only.
* Once verified, the un-verified batch from the listing will disappear.
* So there are two ways to add new listing, one is direct by business owner and other is by random user
* Now during addition of new listing, there are different dropdown or check box option to choose like category, sub-category, city, area etc.
* So now here other than those options, we have to give an option of “Add New”.
* Using this, user can add new category, sub-category, area, city data on its own and it gets registered automatically into admin’s data and user can register themselves with that new one and the data of that new added thing will be registered forever into database so that whenever new listing addition is done, if user tries to find that newly added data, he can find it as a already present option.


Feature for Normal User:
* Sign-up on basis of few basic details and same otp verification and then sign-in.
*. User can search any business from homepage by typing anyone of the following:Category, Sub-category, Business Owner Mobile Number, Business Name.
- A category, sub-category etc drop-down based search bar on homepage.


Feature for Admin:
* Admin can change any already registered business owner status as paid and a batch will be shown on his live profile. (See Justdial showing JDVERIEID Batch to understand this feature).
* Admin can add/edit category, sub-category etc. and can also delete any business listing.
* Admin can see any business database on basis of different parameters like if he wants to see only city wise database he can see that, or may be he can see only paid listing database or only area-wise database. He can see on behalf of any one specific type of parameters, he wants to see.
* Admin can manipulate the pages and re-order business owner visibility from top to bottom basis.
* Admin will set price with each business owner and highest paid business owner will show on top and so-on.
* The any 2-fields will be linked to each other and can be done by admin as per his choice.

* Suppose 5 sellers got registered as mobile phone owner in delhi, and 10 sellers got registered as laptop sellers in mumbai.

* So now when user search for mobile phone sellers in delhi, he will get to see those 5 sellers on search result page, so now admin should have options to manipulate the order means which seller will show on top and which on bottom.

* For this, may be, we can give option in backend for admin, a tab named “Re-Sequence”, over there , he will select the category and city and then sellers registsred in that category with that city will display and then he can re-order. (this is just an idea, you can do any way)
* Overall focus is, as we know there will be many categories and many cities, so admin should be able to re-order for a specific category with sub-category and city.


* For re-ordering, in front of every seller, a price box will be there where admin will enter some price and then click save. This way he will enter for all sellers, and then automatically which ever seller’s price was high will come to top and this way ascending to descending: high price to low price.
 
 
 
Feature for Search Result Page:
- Those parameters selected for listing, filter for all those will be present on search result page like city, area, category, sub-category etc.
- On search result page, show a sidebar column of “Near-by Listing”.
* In this section, listings present near to user current location will be displayed.
* The near-by listing needs to be of same business, which user has searched.
--- For this, fetch user location, fetch which business user has searched, show result on basis of that.
For now, leave this Near-By Listing Part, I will try that we don’t get to do this but may be we have to do, so be prepared too.



Referral Feature:
* Any user can refer a business owner entering details of business owner and business owner will get a message for the same with confirmation link to claim the business.
- Unclaimed businesses will be live but will show as unclaimed tag.
- The tag will disappear after it’s claimed.
 
This is point wise:

This just a point-wise briefing, although everything present here,already described above.
ADMIN
-Admin Login
-Admin Forgot Pass
-Dashboard
-Search box
-All Listing with filter (categories, state, city, area, today, yesterday custom)
-All Users
-Analytics
-Add/edit/delete county
-Add/edit/delete state
-Add/edit/delete city
-Add/edit/delete area and pincode
-Add/edit Category
-Add/edit subcategory
-Add/edit keywords
- business Listing Edit/delete, plan upgrade
- Add/edit package Price
HOME
-current location
-Add Listing
-Contact Us (only text box, name number, text box submit aur email par mail aayega)
-Login/Register
-Sms api for OTP, forgot password, business inquiry business owner ko
-User kisi ka business add karne ke bad add kiye number par owner ko msg send hoga wo niche likha hai
-Search box
-Show Top trading
-Show new listing added
Search result page
-Business name, categories, subcategory, keyword ki listing, Nearby Listings, Listing Details with profile pic, business name, area, city, rating
 Business profile page
Business name, logo, banner, gallery, about us, offers, address, social link, call, website

