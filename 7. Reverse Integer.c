int reverse(int x){
    bool ispositive = true;
    long long ans = 0;
    while(x!=0){
        if(ans>INT_MAX/10 || ans<INT_MIN/10)
            return 0;
        else if(ans==INT_MAX/10 || ans==INT_MIN/10){
            if(x%10>7 || x%10<-8)
                return 0;
        }
        ans=ans*10+x%10;
        x=x/10;
    }
    return (int) ans;
}


or

int reverse(int x){
    long long ans = 0;
    while(x!=0){
        ans = x % 10 + ans * 10;
        x = x / 10;
    }
    return (ans>INT_MAX || ans<INT_MIN) ? 0 : ans;
}
