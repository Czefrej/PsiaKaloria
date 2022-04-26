#!/usr/bin/env python3

import json
import requests
import shopify
import binascii
import time
import os
import datetime
import uuid
import sys

mail=sys.argv[1]
order_num = sys.argv[2]

if mail is None:
    exit(0)

if order_num is None:
    exit(0)

def random_string(string_length=6):
    """Returns a random string of length string_length."""
    random = str(uuid.uuid4()) # Convert UUID format to a Python string.
    random = random.upper() # Make all characters uppercase.
    random = random.replace("-","") # Remove the UUID '-'.
    return random[0:string_length] # Return the random string.


spreadsheet_id = '1fAdof7EgNdcCalUYIbOmo44VI2bA55PBXRvc51sjNpE'
sheet_name = 'Form+Responses+1'

API_KEY = "bd6f8d2e075b13d1d9416e5532f50792"
API_SECRET = "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"
access_token = "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"

db = "https://opensheet.elk.sh/{}/{}".format(spreadsheet_id,sheet_name);
#print(db)

response = requests.get(db)
data = response.json()

text_json = json.dumps(data)

shopify.Session.setup(api_key=API_KEY, secret=API_SECRET)

shop_url = "psiakaloria.myshopify.com"
api_version = '2020-10'

session = shopify.Session(shop_url, api_version)


session = shopify.Session(shop_url, api_version, access_token)
shopify.ShopifyResource.activate_session(session)

start_date = datetime.datetime.now()
end_date = start_date + datetime.timedelta(days=3)
end_date = end_date.replace(minute=59, hour=23, second=59)

shop = shopify.Shop.current() # Get the current shop

coupon = random_string()
price_rule = shopify.PriceRule.create({
"title" : "MAILRETARGET10OFF-{}-{}-{}".format(coupon,mail,order_num),
"target_type": "line_item",
"target_selection": "entitled",
"allocation_method": "across",
"value_type": "percentage",
"value": -10,
"customer_selection": "all",
"usage_limit":1,
"entitled_collection_ids": [392565850367],
"starts_at":start_date.isoformat(),
"ends_at":end_date.isoformat()
})

discount_code = shopify.DiscountCode({
    "code" : "PKHERO-{}".format(coupon),
    "id" : int(time.time())
})
price_rule.add_discount_code(discount_code)

print(json.dumps(["PKHERO-{}".format(coupon),end_date.strftime("%d/%m/%Y, %H:%M:%S")]))
