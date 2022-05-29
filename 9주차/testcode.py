import json
import urllib.parse
import boto3 

s3 = boto3.resource('s3')

def lambda_handler(event, context):
    bucketname = event['Records'][0]['s3']['bucket']['name']
    key = urllib.parse.unquote_plus(event['Records'][0]['s3']['object']['key'], encoding='utf-8')
    
    print("{} object is in {} bucket!".format(key, bucketname))
    
    return key
