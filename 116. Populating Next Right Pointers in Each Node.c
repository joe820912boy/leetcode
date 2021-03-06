/**
 * Definition for a Node.
 * struct Node {
 *     int val;
 *     struct Node *left;
 *     struct Node *right;
 *     struct Node *next;
 * };
 */

struct Node* connect(struct Node* root) {
	if(root==NULL) return NULL;
    if(root->left){
        root->left->next = root->right;
        connect(root->left);
        if(root->next) root->right->next = root->next->left;
        else root->right->next = NULL;
        connect(root->right);
    }
    return root;
}
