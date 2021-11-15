int removeDuplicates(int* nums, int numsSize){
    int temp=0;
    if(numsSize==0) return 0;
    for(int i=1;i<numsSize;i++){
        if(nums[i]!=nums[temp]){
            nums[++temp]=nums[i];
        } 
    }
    return temp+1;
}
