import requests
import json
import sys
import datetime
from pprint import pprint

# API configuration
FIXER_API_KEY = "your_fixer_api_key"
CRYPTOCOMPARE_API_KEY = "your_cryptocompare_api_key"
FIXER_URL = f"http://data.fixer.io/api/latest?access_key={FIXER_API_KEY}"
HISTORICAL_URL = f"http://data.fixer.io/api/{{}}?access_key={FIXER_API_KEY}"
CRYPTO_URL = "https://min-api.cryptocompare.com/data/price"

# Fetch latest exchange rates
data = requests.get(FIXER_URL).text
data2 = json.loads(data)
fx = data2["rates"]

# Fetch cryptocurrency rates
def get_crypto_rates(symbols):
    url = f"{CRYPTO_URL}?fsym=USD&tsyms={','.join(symbols)}&api_key={CRYPTOCOMPARE_API_KEY}"
    response = requests.get(url).json()
    return response

crypto_symbols = ["BTC", "ETH", "XRP", "LTC"]
crypto_rates = get_crypto_rates(crypto_symbols)

currencies = {
    "AED": "Emirati Dirham",
    "AFN": "Afghan Afghani",
    "ALL": "Albanian Lek",
    # ... include all other currencies as before
    "USD": "US Dollar",
    "EUR": "Euro"
}

# Function to get historical rates
def get_historical_rates(date):
    url = HISTORICAL_URL.format(date)
    response = requests.get(url).json()
    return response["rates"]

# Function to convert currency
def convert_currency(amount, from_currency, to_currency, rates):
    from_currency = from_currency.upper()
    to_currency = to_currency.upper()
    
    if from_currency in crypto_symbols:
        from_rate = crypto_rates[from_currency]
    else:
        from_rate = rates[from_currency]

    if to_currency in crypto_symbols:
        to_rate = crypto_rates[to_currency]
    else:
        to_rate = rates[to_currency]

    converted_amount = amount * to_rate / from_rate
    return round(converted_amount, 2)

# Function to display historical rates
def historical_conversion():
    date = input("Enter the date for historical rates (YYYY-MM-DD): ")
    try:
        datetime.datetime.strptime(date, "%Y-%m-%d")
        historical_rates = get_historical_rates(date)
        pprint(historical_rates)
    except ValueError:
        print("Invalid date format. Please try again.")

# Main conversion function
def main():
    while True:
        query = input(
            "Enter amount, from currency, to currency (e.g. '100 USD EUR') or 'HISTORICAL' for historical rates or 'Q' to quit: "
        )
        if query.upper() == "Q":
            sys.exit()
        elif query.upper() == "HISTORICAL":
            historical_conversion()
        else:
            try:
                qty, from_currency, to_currency = query.split()
                qty = float(qty)
                result = convert_currency(qty, from_currency, to_currency, fx)
                print(f"{qty} {from_currency} = {result} {to_currency}")
            except ValueError:
                print("Invalid input. Please try again.")

# Start the program
if __name__ == "__main__":
    try:
        main()
    except KeyError as e:
        print(f"Error: {e}. Please try again.")